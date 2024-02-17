<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    //

    public function list()
    {

        return view('district.list', ['layout' => 'admin.layouts.app', 'districts' =>  District::get()->toArray()]);
    }
    public function addDistrict()
    {
        return view('district.form', ['layout' => 'admin.layouts.app']);
    }

    public function storeDistrict(Request $request)
    {

        $district =  $request->validate([
            'district' => "required",
        ]);
        $newDistrict  = new District;
        $newDistrict->name = $district['district'];
        $newDistrict->save();
        return redirect('admin/district');
    }
    public function editDistrict($id)
    {

        return view('district.form', ['layout' => 'admin.layouts.app','district'=> District::find($id)]);

    }

    public function updateDistrict(Request $request, $id)
    {
        $district =  $request->validate([
            'district' => "required",
        ]);
        $newDistrict  = District::find($id);
        $newDistrict->name = $district['district'];
        $newDistrict->save();
        return redirect('admin/district');
    }
}
