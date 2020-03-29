<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function create()
    {
        $settings = Settings::find(1);
        if(!$settings){
            $settings = new Settings();
        }

        return view('admin.settings.create',compact('settings'));
    }

    public function store(Request $request)
    {
        $rules = [
            'default_vat' => 'required|numeric|between:0,99.99',
        ];

        $request->validate($rules);

        $settings = Settings::find(1);
        if(!$settings){
            $settings = new Settings();
        }
        $settings->default_vat = $request->default_vat;
        $settings->save();

        return redirect()->back();
    }
}