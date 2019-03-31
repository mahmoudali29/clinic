<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class AreaRequest extends FormRequest
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
                $rules['fldNameAR'] = 'required|unique:tbl_areas,fldNameAR|string';
                $rules['fldNameEN'] = 'required|unique:tbl_areas,fldNameEN|string';
                $rules['fkCountryID'] = 'required';
                
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_areas,fldNameAR,'.Request::segment(3).',pkAreaID|string';
                $rules['fldNameEN'] = 'required|unique:tbl_areas,fldNameEN,'.Request::segment(3).',pkAreaID|string';
                $rules['fkCountryID'] = 'required';
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fkCountryID.required' => 'Please Select Country Name',
            'fldNameAR.required' => '  .من فضلك ادخل اسم المنطقه ',
            'fldNameAR.unique' => 'هذا الاسم موجود. ',
            'fldNameAR.string' =>'ادخل الاسم صحيح',
            'fldNameEN.required' => 'Please Enter Area Name . ',
            'fldNameEN.unique' => 'This Name Repeated',
            'fldNameEN.string' => 'Please Enter Name Correctly',
        ];
    }
}
