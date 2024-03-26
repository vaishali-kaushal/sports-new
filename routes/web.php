<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
// ===============
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NurseryController;
use App\Http\Controllers\CoachDashboardController;
use App\Http\Controllers\AtendanceController;
use App\Http\Controllers\NurseryUserController;
use App\Http\Controllers\DsoController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('login/otp/{id}', [LoginController::class, 'loginOtp']);
Route::post('login/otp/verify/{id}', [LoginController::class, 'verifyOtp']);
Route::get('login/otp/resendotp/{id}', [LoginController::class, 'resendotp']);
Route::prefix('dso')->name('dso.')->middleware(['IsDso'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/view-nurseries-report/{status}', [DashboardController::class, 'dsoNurseryReport'])->name('nurseryReport');
    Route::get('/nursery', [NurseryController::class, 'index'])->name('index');
    Route::get('/nursery/pendingapproval/{status?}', [NurseryController::class, 'pendingApproval']);
    Route::get('/nursery/approvedList/', [NurseryController::class, 'approvedListbyadmin']);
    Route::get('/nursery/reject/list', [NurseryController::class, 'rejectListbyadmin']);
    Route::get('nursery/objection/list', [NurseryController::class, 'objectionListbyadmin']);
    Route::get('/nursery/view/{id}', [NurseryController::class, 'viewNursery'])->name('viewNursery');
    Route::get('/nursery/report/{id}', [DsoController::class, 'nurseryReport']);
    Route::post('/nursery/report/store/{id}', [DsoController::class, 'nurseryReportStore']);
    Route::post('/nursery/file_upload', [DsoController::class, 'reportFileUpload'])->name('applicationreport');
    Route::post('/nursery/remove_file', [DsoController::class, 'reportFileRemove'])->name('fileRemove');
    Route::get('list-nursery', [DsoController::class, 'nurseryList'])->name('nurseryList');
    Route::get('nursery/registration/{id?}', [DsoController::class, 'nurseryRegistration'])->name('nursery.register');
    Route::get('nursery/delete/{id}', [DsoController::class, 'nurseryDelete'])->name('nursery.delete');
    Route::post('store-nursery-detail/{id?}', [DsoController::class, 'saveNurseryDetail'])->name('saveNurseryDetail');



});
Route::get('nursery/registration', [LoginController::class, 'nurseryRegistration'])->middleware('check.date');
Route::post('nursery/store', [NurseryController::class, 'nurseryStore']);

Route::post('nursery/validate-email', [NurseryController::class, 'validateEmail'])->name('nursery.email');
Route::post('nursery/validate-otp', [NurseryController::class, 'validateEmailOtp'])->name('nursery.validateOtp');

Route::post('nursery/validate-mobile-number', [NurseryController::class, 'validateMobileNumber'])->name('nursery.validateNumber');
Route::post('nursery/mobile-otp', [NurseryController::class, 'validateMobileOtp'])->name('nursery.validateMobileOtp');

Route::post('nursery/resend-mobile-otp', [NurseryController::class, 'resendOTP'])->name('nursery.resendOTP');

Route::post('nursery/save-nursery-details', [NurseryController::class, 'saveNurseryDetails'])->name('nursery.nurseryDetails');
Route::post('nursery/file_upload', [NurseryController::class, 'NurseryFileUpload'])->name('nursery.fileUpload');
Route::post('nursery/remove_file', [NurseryController::class, 'NurseryFileRemove'])->name('nursery.fileRemove');
// ========================
Route::get('coach/registration/{token}', [LoginController::class, 'coachRegistration']);
Route::post('coach/store/{token}', [LoginController::class, 'coachStore']);
Route::post('coach/password/store/{token}', [LoginController::class, 'coachPasswordUpdate']);



Route::get('coach/otp/{mobiletoken}/{emailtoken}', [LoginController::class, 'coachOtp']);
Route::get('coach/password/{token}', [LoginController::class, 'coachPassword']);
// ===============================================================================
Route::get('login/coach/otp/resendotp/{token}', [LoginController::class, 'coachOtpResend']);


Route::post('coach/mobile/otp/verify/{token}', [LoginController::class, 'coachOtpMobileVerify']);
Route::post('coach/email/otp/verify/{token}', [LoginController::class, 'coachOtpEmailVerify']);

// ========================
Route::prefix('admin')->name('admin.')->middleware(['IsAdmin'])->group(function () {
    Route::get('changepassword', [LoginController::class, 'changePasswordAdmin']);


    Route::get('/dashboard', [DashboardController::class, 'admin']);
    Route::get('/view-nurseries-report/{status}', [DashboardController::class, 'adminNurseryReport'])->name('nurseryReport');
    // ==============================
    Route::get('/game', [GameController::class, 'index']);
    Route::get('add/game', [GameController::class, 'addgame']);
    Route::post('store/game', [GameController::class, 'storegame']);
    Route::get('edit/game/{id}', [GameController::class, 'editgame']);
    Route::post('update/game/{id}', [GameController::class, 'updategame']);
    // ======district======
    Route::get('/district', [DistrictController::class, 'list']);
    Route::get('add/district', [DistrictController::class, 'addDistrict']);
    Route::post('store/district', [DistrictController::class, 'storeDistrict']);
    Route::get('edit/district/{id}', [DistrictController::class, 'editDistrict']);
    Route::post('update/district/{id}', [DistrictController::class, 'updateDistrict']);
    // ============
    Route::get('/dso', [UserController::class, 'dso']);
    Route::get('add/dso', [UserController::class, 'adddso']);
    Route::get('edit/dso/{id}', [UserController::class, 'editdso']);
    Route::post('store/dso', [UserController::class, 'storeDso']);
    Route::post('update/dso/{id}', [UserController::class, 'updateDso']);
    //================================================
    Route::get('/nursery/list', [AdminController::class, 'AdminList'])->name('pendingList');
    Route::get('/nursery/approved_list', [AdminController::class, 'approvedList'])->name('approved_list');
    Route::get('/nursery/reject_list', [AdminController::class, 'rejectList'])->name('reject_list');
    Route::get('/nursery/objection_list', [AdminController::class, 'objectionList'])->name('objection_list');
    Route::get('/nursery/list/r', [NurseryController::class, 'AdminListRecomanded']);
    Route::get('/nursery/list/notr', [NurseryController::class, 'AdminListNotRecomanded']);
    Route::get('/nursery/{status}', [NurseryController::class, 'AdminListApprovedorReject']);
    Route::get('/nursery/view/{id}', [NurseryController::class, 'viewNursery']);
    Route::post('/nursery/print', [NurseryController::class, 'printNursery'])->name('printNursery');
    Route::get('/nursery/status/update/{status}/{id}', [NurseryController::class, 'statusUpdate']);
    Route::get('/nursery/approve_reject/{id}', [AdminController::class, 'adminProcess'])->name('adminProcess');
    Route::post('/nursery/report/store/{id}', [AdminController::class, 'AdminReportStore'])->name('saveNurseryReport');
    Route::get('/excel-download', [AdminController::class, 'excelDownload'])->name('excelDownload');
    Route::get('/districtReport', [DashboardController::class, 'districtReport'])->name('districtReport');
    Route::get('/nursery-category-report/{category}', [DashboardController::class, 'nurseryCategoryReport'])->name('nurseryCategoryReport');
    Route::get('/gamedispReport', [DashboardController::class, 'gameDispReport'])->name('gameDispReport');

});

// ==================================================
Route::prefix('coach')->name('coach.')->middleware(['IsCoach'])->group(function () {
    Route::get('dashboard', [CoachDashboardController::class, 'index']);
    Route::get('player/add', [UserController::class, 'addPlayer']);
    Route::get('player/edit/{id}', [UserController::class, 'editPlayer']);
    Route::post('player/store', [UserController::class, 'storePlayer']);
    Route::post('player/update/{id}', [UserController::class, 'updatePlayer']);

    // =====================
    Route::get('player/list', [UserController::class, 'playerList']);
});

Route::get('view-nursery/{id?}', [NurseryUserController::class, 'viewNursery'])->name('view.userNursery');

Route::prefix('nursery')->middleware(['IsNursery'])->group(function () {
    Route::get('dashboard', [NurseryUserController::class, 'index']);
    Route::get('user-nursery', [NurseryUserController::class, 'userNursery'])->name('user.nursery')->middleware('check.date');
    Route::post('update-nursery-details', [NurseryUserController::class, 'updateNurseryDetails'])->name('update.nurseryDetails');
    Route::post('update-file-upload', [NurseryUserController::class, 'NurseryFileUpload'])->name('updatefileUpload');
    Route::post('update-remove-file', [NurseryUserController::class, 'NurseryFileRemove'])->name('updatefileRemove');
    Route::get('add-coach', [NurseryUserController::class, 'addCoach'])->name('add.coach');
    Route::post('store-coach-detail', [NurseryUserController::class, 'saveCoachDetail'])->name('save.coachDetail');
    Route::get('player-list', [NurseryUserController::class, 'playerList'])->name('player.list');
    Route::get('add-player', [NurseryUserController::class, 'addPlayer'])->name('addPlayer');
    Route::post('store-player-detail', [NurseryUserController::class, 'savePlayerDetail'])->name('save.playerDetail');

});

// Route::get('test/', [LoginController::class, 'index']);
Route::get('login/', [LoginController::class, 'index']);
Route::post('login/', [LoginController::class, 'loginVerify']);
Route::get('logout/', [LoginController::class, 'logout']);
// Route::get('test', [TestController::class, 'index']);
Route::get('player', [AtendanceController::class, 'index']);
Route::get('general_instructions', [NurseryController::class, 'generalInstructions'])->name('general_instructions');
Route::get('get-nursery-data', [NurseryController::class, 'getnurseryData'])->name('getnurseryData');
Route::get('dashboard-mis', [NurseryController::class, 'dashboardMis'])->name('dashboardMIS');
