<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
class CityRequest extends FormRequest
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
                $rules['fldNameAR'] = 'required|unique:tbl_cities,fldNameAR|string';
                $rules['fldNameEN'] = 'required|unique:tbl_cities,fldNameEN|string';
                $rules['fkAreaID'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_cities,fldNameAR,'.Request::segment(3).',pkCityID|string';
                $rules['fldNameEN'] = 'required|unique:tbl_cities,fldNameEN,'.Request::segment(3).',pkCityID|string';
                $rules['fkAreaID'] = 'required';
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fkAreaID.required' => 'Please Select Area Name',
            'fldNameAR.required' => '.من فضلك ادخل اسم المدينه ',
            'fldNameAR.unique' => 'هذا الاسم موجود. ',
            'fldNameAR.string' => '.من فضلك ادخل الاسم صحيحا ',
            'fldNameEN.required' => 'Please Enter City Name',
            'fldNameEN.unique' => 'This Name Repeated',
            'fldNameEN.string' => 'Please Enter Name Correctly',
        ];
    }
}
