<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $Request)
    {
        $rules = array();
        switch ($this->method()) {
            case 'POST':
            {
                $rules['fldSiteNameAR'] = 'required|unique:tbl_setting,fldSiteNameAR|string';
                $rules['fldSiteNameEN'] = 'required|unique:tbl_setting,fldSiteNameEN|string';
                $rules['fldMinInsuranceAmount'] = 'required|unique:tbl_setting,fldMinInsuranceAmount|integer';
                
                $rules['fldPhoto'] = 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048';
                 
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldSiteNameAR'] = 'required|unique:tbl_setting,fldSiteNameAR,'.Request::segment(3).',pkSettingID|string';
                $rules['fldSiteNameEN'] = 'required|unique:tbl_setting,fldSiteNameEN,'.Request::segment(3).',pkSettingID|string';
                $rules['fldMinInsuranceAmount'] = 'required|integer';

                
                $rules['fldPhoto']  = 'image|mimes:png,jpg,jpeg,gif,svg|max:2048';
                
                
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fldSiteNameAR.required' => '  .من فضلك ادخل اسم الموقع ',
            'fldSiteNameEN.unique' => 'Please Enter Site Name',
            // 'fldMinBasicInsurance.string' =>'من فضلك ',
            // 'fldMiaxBasicInsurance.required' => 'Please Enter Department Name',
            // 'fldMinVariableInsurance.unique' => 'This Name Repeated',
            // 'fldMaxVariableInsurance.string' => 'Please Enter Name Correctly',
            
        ];
    }
}
