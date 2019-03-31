<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StaffInsuranceRequest extends FormRequest
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
     *'
     * @return array
     */
    public function rules()
    {

        $rules = array();
        switch ($this->method()) {
            case 'POST':
            {
                $rules['fkStaffID'] = 'required';
                $rules['fkInsuranceID'] = 'required';
                $rules['fldMinFixAmount'] = 'required|integer';
                $rules['fldMaxVarAmount'] = 'required|integer';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fkStaffID'] = 'required';
                $rules['fkInsuranceID'] = 'required';
                $rules['fldMinFixAmount'] = 'required|integer';
                $rules['fldMaxVarAmount'] = 'required|integer';

            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [

        ];
    }
}
