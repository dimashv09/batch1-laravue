<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.setting.index');
    }

    public function show()
    {
        return Setting::first();
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->company_name = $request->company_name;
        $setting->address = $request->address;
        $setting->phone_number = $request->phone_number;
        $setting->discount = $request->discount;
        $setting->note_type = $request->note_type;

        if($request->hasFile('logo_path')){
            $file = $request->file('logo_path');
            $name = 'logo-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $name);

            $setting->logo_path = "/img" . "/". $name;
        }

        $setting->update();

        return response()->json('Data berhasil di update', 200);
    }
}
