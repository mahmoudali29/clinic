<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
class BranchRequest extends FormRequest
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
    public function rules()
    {
        $rules = array();
        switch ($this->method()) {
            case 'POST':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_branches,fldNameAR|string';
                $rules['fldNameEN'] = 'required|unique:tbl_branches,fldNameEN|string';
                //  $rules['fkCityID'] = 'required';
                $rules['fldPhone1'] = 'required|unique:tbl_branches,fldPhone1|string';
                $rules['fldPhone2'] = 'required|unique:tbl_branches,fldPhone2|string';
                $rules['fldAddressAR'] = 'required|unique:tbl_branches,fldAddressAR|string';
                $rules['fldAddressEN'] = 'required|unique:tbl_branches,fldAddressEN|string';

            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_branches,fldNameAR,'.Request::segment(3).',pkBranchID|string';
                $rules['fldNameEN'] = 'required|unique:tbl_branches,fldNameEN,'.Request::segment(3).',pkBranchID|string';
                //  $rules['fkCityID'] = 'required'.Request::segment(3).
                $rules['fldPhone1'] = 'required|unique:tbl_branches,fldPhone1,'.Request::segment(3).',pkBranchID|string';
                $rules['fldPhone2'] = 'required|unique:tbl_branches,fldPhone2,'.Request::segment(3).',pkBranchID|string';
                $rules['fldAddressAR'] = 'required|unique:tbl_branches,fldAddressAR,'.Request::segment(3).',pkBranchID|string';
                 $rules['fldAddressEN'] = 'required|unique:tbl_branches,fldAddressEN,'.Request::segment(3).',pkBranchID|string';            
        }
    }
        return $rules;
    }


    public function messages()
    {
        return [
            'fldNameAR.required' => '  .من فضلك ادخل اسم الفرع ',
            'fldNameEN.required' => 'Please Enter Branch Name . ',
            'fkCityID.required' => 'Please Enter City Name . ',
            'fldPhone1.required' => 'من فضلك ادخل اسم الهاتف ',
            'fldPhone2.required' => '.من فضلك ادخل اسم الهاتف ',
            'fldAddressAR.required' => 'من فضلك ادخل اسم الفرع ',
            'fldAddressEN.required' => 'Please Enter AddressEN Name . ',
            // 'fkCreatedByUserID.required' => 'Please Enter Branch Name . ',
        ];
    }
}
