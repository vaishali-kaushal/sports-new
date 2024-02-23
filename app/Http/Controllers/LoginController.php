<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleType;
use App\Models\District;
use App\Models\Game;
use App\Models\User;
use App\Models\Otp;
use App\Models\Nursery;
use App\Models\RoleGroup;
use App\Models\Coach;
use App\Models\CoachOtp;
use App\Models\CoachQualification;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }
    public function LoginOtp($id)
    {
        $otp =  Otp::select('mobile')->where('secure_id', $id)->where('status', 0)->first();

        $mobile = substr($otp->mobile, -4);
        $msg = "OTP Sent to your registered mobile No. ******" . $mobile . "";
        return view('otp.otp', ['token' => $id, 'msg' => $msg]);
    }
    public function verifyOtp($id, Request $request)
    {
        $otpp = $request->validate(['otp' => 'required']);
        $otp =  Otp::where('secure_id', $id)->where('status', 0)->where('otp', $otpp['otp'])->first();

        if (!empty($otp)) {

            $otp->status = 1;
            $otp->save();
            $user = User::where('secure_id', $otp['user_id'])->first();
            $group =  RoleType::where('user_id', $user->id)->first();
            Auth::login($user);
            if ($group->user_role->role_name == 'dso') {
                return redirect('dso/dashboard');
            } else if ($group->user_role->role_name == 'admin') {
                return redirect('admin/dashboard');
            } else if ($group->user_role->role_name == 'coach') {
                return redirect('coach/dashboard');
            } else if ($group->user_role->role_name == 'nursery') {
                return redirect('nursery/dashboard');
            }
            else
            {
                return redirect('/');

            }

        }

        return back()->withErrors([
            'otp' => 'The OTP Is not valid',
        ])->onlyInput('email');
    }
    public function resendotp($id, Request $request)
    {
        $otpp=$this->generateNumericOTP(6);

        $otp =  Otp::where('secure_id', $id)->where('status', 0)->first();
        $otp->otp = $otpp;
        $otp->save();

        $message="Dear User, ".$otpp. "is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
        $temp_id = "1407170557686704067";
        $this->sendSMS($otp->mobile,$message,$temp_id);


        return redirect()->back()->with('success', 'OTP send');
    }


    public function nurseryRegistration()
    {

        return view('nursery.register', ['districts' => District::get()->toArray(), 'games' => Game::get()->toArray(), 'coach_qualification' => CoachQualification::where('is_active', 1)->get()->toArray()]);
    }
    public function loginVerify(Request $request)
    {

        $user =  $request->validate([
            'phone' => 'required'
            // 'password' => 'required',
        ]);


        $userr  = User::where('mobile', $user['phone'])->first();

        if (!empty($userr->password)) {
            // if (!empty($user) && Hash::check($user['password'], $userr->password)) {
            if (!empty($user)) {
                $secureId = bin2hex(random_bytes(16));
                // $otpp=$this->generateNumericOTP(6);
                if(env('APP_ENV') == "local"){
                    $otpp='111111';
                }else{
                    $otpp=$this->generateNumericOTP(6);
                }
                $otp = new Otp;
                $otp->secure_id = $secureId;
                $otp->mobile = $userr->mobile;
                $otp->user_id = $userr->secure_id;
                $otp->status = 0;
                $otp->otp = $otpp;
                $otp->save();
                $message="Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
                $temp_id = "1407170557686704067";
                $this->sendSMS($userr->mobile,$message,$temp_id);



                return redirect('login/otp' . '/' . $secureId);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
    public function changePasswordAdmin()
    {

        return view('changePassword', ['layout' => 'admin.layouts.app']);
    }

    public function coachRegistration($token)
    {

        $nursery = Nursery::where('secure_id', $token)->first();
        if (empty($nursery)) {
            return redirect('login');
        }

        $coach = Coach::where('nurserie_secure_id', $token)->where('final_confirm',1)->first();

        if (!empty($coach)) {
            return redirect('login');
        }



        return view('coach.registration', ['token' => $token]);
    }
    public function coachStore($token, Request $request)
    {

        $nursery = Nursery::where('secure_id', $token)->first();
        if (empty($nursery)) {
            return redirect('login');
        }
        $coachUser =  $request->validate(
            [
                'coach_name' => 'required',
                'father_name' => 'required',
                'age' => 'required',
                'adhar_number' => 'required',
                'sports_coach' => 'required',
                'mobile_no' => 'required',
                'email' => 'required',
            ],
            [
                "coach_name.required" => "This field is Required",
                "father_name.required" => "This field is Required",
                "cemailat_of_nursery.required" => "This field is Required",
                "age.required" => "This field is Required",
                "adhar_number.required" => "This field is Required",
                "sports_coach.required" => "This field is Required",
                "mobile_no.required" => "This field is Required",
                "email.required" => "This field is Required",
            ]
        );


        if (empty($request->file('profile_pic'))) {


            return back()->withErrors([
                'profile_pic' => 'please upload a image',
            ])->onlyInput('profile_pic');

        }
        if (empty($request->file('achievements_with_pics'))) {


            return back()->withErrors([
                'achievements_with_pics' => 'please upload a image',
            ])->onlyInput('achievements_with_pics');

        }
        $user = User::where('email', $coachUser['email'])->first();

        if (!empty($user)) {

            return back()->withErrors([
                'email' => 'email is already registred',
            ])->onlyInput('email');
        }


        $user = User::where('mobile', $coachUser['mobile_no'])->first();

        if (!empty($user)) {
            return back()->withErrors([
                'mobile_number' => 'Mobile is already registred',
            ])->onlyInput('mobile_number');
        }


        $coach = Coach::where('nurserie_secure_id', $token)->first();
        if (empty($coach)) {
            $coach = new Coach;
        }
        $coach->coach_name = $coachUser['coach_name'];
        $coach->father_name = $coachUser['father_name'];
        $coach->age = $coachUser['age'];
        $coach->adhar_number = $coachUser['adhar_number'];
        $coach->sports_coach = $coachUser['sports_coach'];
        $coach->mobile_no = $coachUser['mobile_no'];
        $coach->email = $coachUser['email'];
        $coach->secure_id  = bin2hex(random_bytes(16));
        $coach->nurserie_secure_id  = $token;
        $coach->save();

        // redirect to coach otp blade
        $emailSecureId = bin2hex(random_bytes(16));
        $mobileSecureId = bin2hex(random_bytes(16));



        $coachOtp = new CoachOtp;
        $coachOtp->secure_id  = $mobileSecureId;
        $coachOtp->mobile  =  $coach->mobile_no;
        $coachOtp->coach_id  = $coach->secure_id;
        $coachOtp->otp  = '11111';
        $coachOtp->save();
        // coade for email sender



        $coachOtp = new CoachOtp;
        $coachOtp->secure_id  = $emailSecureId;
        $coachOtp->email  = $coach->email;
        $coachOtp->coach_id  = $coach->secure_id;
        $coachOtp->otp  = '11111';
        $coachOtp->save();

        // coade for mobile otp sender
        // redirect to otp page with email and mobile token

        return redirect('coach/otp/' . $mobileSecureId . '/' . $emailSecureId);
    }

    public function coachOtp($mobiletoken, $emailtoken)
    {

        $mobile = CoachOtp::where('secure_id', $mobiletoken)->first();
        $email = CoachOtp::where('secure_id', $emailtoken)->first();



        if ($mobile->status == 1 && $email->status == 1) {


            $coach = coach::where('secure_id', $mobile->coach_id)->first();
            $coach->email_verified_at = 1;
            $coach->mobile_verified_at = 1;
            $coach->save();
            $coach = coach::where('secure_id', $mobile->coach_id)->first();
            $user = user::where('email', $coach->email)->first();


            if (empty($user)) {
                $user =  user::where('secure_id', $coach->user_secure_id)->first();
                if (empty($user)) {
                    $user = new User;
                }

                $user->secure_id = bin2hex(random_bytes(16));
                $user->password = bin2hex(random_bytes(16));
                $user->name = $coach->coach_name;
                $user->email = $coach->email;
                $user->mobile = $coach->mobile_no;
                // $user->email_verified_at = 1;
                // $user->mobile_verified_at = 1;
                $user->save();
                $role =  new RoleType;
                $role->user_id = $user->id;
                $role->role_id = 3; // for coach
                $role->save();

                $coach->user_secure_id = $user->secure_id;
                $coach->save();

                return redirect('coach/password' . '/' . $user->secure_id);
            }
        }

        $mobilee = substr($mobile->mobile, -4);
        $msg['mobilemsg'] = "OTP Sent to your registered mobile No. ******" . $mobilee . "";
        // die;
        $emaill = substr($email->email,0,2);
        $msg['emailmsg'] = "OTP Sent to your registered email " . $emaill . "******";

        return view('otp.coach.otp', ['mobile' => $mobile, 'email' => $email],$msg);
    }


    public function coachOtpMobileVerify($token, Request $request)
    {
        $otpmobile = $request->validate([
            'otp' => "required"
        ]);


        $coachOtp = CoachOtp::where('secure_id', $token)->where('otp', $otpmobile['otp'])->where('status', 0)->first();
        if (!empty($coachOtp)) {
            $coachOtp->status = 1;
            $coachOtp->save();
            return redirect()->back()->with('success', 'otp matched');
        }
        return back()->withErrors([
            'otp' => 'otp not valid',
        ])->onlyInput('otp');
    }
    public function coachOtpEmailVerify($token, Request $request)
    {
        $otpEmail = $request->validate([
            'otp' => "required"
        ]);


        $coachOtp = CoachOtp::where('secure_id', $token)->where('otp', $otpEmail['otp'])->where('status', 0)->first();
        if (!empty($coachOtp)) {
            $coachOtp->status = 1;
            $coachOtp->save();
            return redirect()->back()->with('success', 'otp matched');
        }
        return back()->withErrors([
            'otp' => 'otp not valid',
        ])->onlyInput('otp');
    }

    public function coachPassword($token)
    {
        return view('coach.passsword', ['token' => $token]);
    }
    public function coachPasswordUpdate($token, Request $request)
    {

        $user = $request->validate([


            'password' => 'required',
            'cpassword' => 'required_with:password|same:password'
        ]);
        // coachPasswordUpdate

        $coach = coach::where('user_secure_id', $token)->first();
        $coach->final_confirm = 1;
        $coach->save();
        $userr = User::where('secure_id', $token)->first();
        $userr->password = Hash::make($user['password']);
        $userr->save();
        return  redirect('/')->with('success', "password updated");




    }

    public function coachOtpResend($token)
    {
        $coachOtp = CoachOtp::where('secure_id',$token)->first();
        $coachOtp->otp  = '11111';
        $coachOtp->save();
        return redirect()->back()->with('success', 'OTP send');

    }


}
