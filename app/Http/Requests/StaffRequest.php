<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StaffRequest extends FormRequest
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
                //print_r("expression"); die;
                $rules['fldNameAR'] = 'required|string';
                $rules['fldPhone1'] = 'required|unique:tbladmins,fldPhone1|string';
                // $rules['fldPhone2'] = 'required|unique:tbladmins,fldPhone2|string';
                $rules['fldAddressAR'] = 'required|string';
                $rules['fldAddressEN'] = 'required|string';
                $rules['fldDateOfBirth'] = 'required|string';
                // $rules['fldDegree'] = 'required|unique:tbladmins,fldDegree|string';
                $rules['fldGender'] = 'required|string';
                $rules['fkDepartmentID'] = 'required';
                $rules['fkJobID'] = 'required';
                $rules['fkCountryID'] = 'required';
                $rules['fkAreaID'] = 'required';
                $rules['fkCityID'] = 'required';
                $rules['fkBranchID'] = 'required';

                $rules['name'] = 'required|max:255';
                $rules['email'] = 'required|unique:tbladmins';
                $rules['password'] = 'required|confirmed';
                $rules['password_confirmation'] = 'required';
                $rules['file'] = 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|string';
                $rules['fldPhone1'] = 'required|unique:tbladmins,fldPhone1,'.Request::segment(3).',id|string';
                // $rules['fldPhone2'] = 'required|unique:tbladmins,fldPhone2,'.Request::segment(3).',id|string';
                $rules['fldAddressAR'] = 'required|string';
                $rules['fldAddressEN'] = 'required|string';
                $rules['fldDateOfBirth'] = 'required|string';
                // $rules['fldDegree'] = 'required|unique:tbladmins,fldDegree,'.Request::segment(3).',id|string';
                $rules['fldGender'] = 'required|string';
                $rules['fkDepartmentID'] = 'required';
                $rules['fkJobID'] = 'required';
                $rules['fkCountryID'] = 'required';
                $rules['fkAreaID'] = 'required';
                $rules['fkCityID'] = 'required';
                $rules['fkBranchID'] = 'required';
    
                $rules['name']  = 'required|max:255';
                $rules['email'] = 'required|unique:tbladmins,email,'.Request::segment(3);
                $rules['file']  = 'image|mimes:png,jpg,jpeg,gif,svg|max:2048';
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
                'fldNameAR.required'        => 'ادخل الاسم',
                'fldPhone1.required'        => 'Phone1 is required',
                // 'fldPhone2.required'        => 'Phone2 is required',
                'fldAddressAR.required'        => 'ادخل العنوان',
                'fldAddressEN.required'        => 'Address is required',
                'fldDateOfBirth.required'        => 'Date of birth is required',
                'fldGender.required'        => 'Gender is required',
                'name.required'        => 'Name is required',
                'email.required'       => 'Email is required',
                'email.unique'         => 'The email has already been taken.',
                'password.required'    => 'Password is required', 
                'password.confirmed'    => "Password don't match ", 
                'password_confirmation.required'   => 'Please, Confirm the password',
                'file.required'        => 'please, Upload the admin picture',
                'fkAreaID.required' => 'Please Select Area Name',
                'fkCountryID.required' => 'Please Select Country Name',
                'fkCityID.required' => 'Please Select City Name',
                'fkBranchID.required' => 'Please Select Branch Name',
                'fkDepartmentID.required' => 'Please Select Department Name',
                'fkJobID.required' => 'Please Select Job Name',
                                
        ];
        
    }
}
