<?php

namespace App\Http\Controllers\Admin;
use Session;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminSettings as SettingsModel;

class AdminSettingController extends Controller
{
	public $arrOutputData = [];
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\View\View
      */
     public function index(Request $request)
     {
     	try {
     		$objSetting = SettingsModel::get()->toArray();     		
     		if(!empty($objSetting))
     		{
     		    foreach ($objSetting as $key => $setting) {
     		        $setting_data[$setting['key']] = $setting['value'];
     		    }
     		    $this->arrOutputData['arrGeneral'] = $setting_data;
     		}     		
     		return view('admin.settings.general',$this->arrOutputData);
     		
     	} catch (Exception $e) {
     		return 0;
     	}
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
      */
     public function store()
     {
     	try {
	         $requestData = request()->all();         
	         unset($requestData['_token']);
	         //create array for every key value 
	         foreach ($requestData as $strKey => $strValue) {
	             if(isset($strKey) && isset($strValue))
	             SettingsModel::updateOrCreate(["key"=> $strKey],["key"=> $strKey,"value"=>$strValue]);
	         }
	     	Session::flash('message', 'Details Updated Successfully!');
	        return redirect('admin/general-settings');
     		
     	} catch (Exception $e) {     		
     		return 0;
     	}
     }
     /**
      * To get settings record.
      *
      * @param \Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
      */
     public function getSettingsValue($param)
     {
     	$attrValue = SettingsModel::where('key',$param)->pluck('value')->toArray();
        return $attrValue[0] ?? NULL;
     }
}
