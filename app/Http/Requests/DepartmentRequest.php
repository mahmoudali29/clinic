<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class DepartmentRequest extends FormRequest
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
                $rules['fldNameAR'] = 'required|unique:tbl_departments,fldNameAR|string';
                $rules['fldNameEN'] = 'required|unique:tbl_departments,fldNameEN|string';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_departments,fldNameAR,'.Request::segment(3).',pkDepartmentID|string';
                $rules['fldNameEN'] = 'required|unique:tbl_departments,fldNameEN,'.Request::segment(3).',pkDepartmentID|string';
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fldNameAR.required' => '  .من فضلك ادخل اسم القسم ',
            'fldNameAR.unique' => 'هذا الاسم موجود. ',
            'fldNameAR.string' =>'ادخل الاسم صحيح',
            'fldNameEN.required' => 'Please Enter Department Name',
            'fldNameEN.unique' => 'This Name Repeated',
            'fldNameEN.string' => 'Please Enter Name Correctly',
            
        ];
    }
}
