<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HrDeductionRequest extends FormRequest
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
                $rules['fkStaffID'] = 'required|integer';
                $rules['fldTheAmount'] = 'required|integer';
                $rules['fldHistory'] = 'required|date';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fkStaffID'] = 'required|integer';
                $rules['fldTheAmount'] = 'required|integer';
                $rules['fldHistory'] = 'date';

            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [
            'fkStaffID.required'        => 'staff is required',
            'fkStaffID.integer'        => 'Please Enter valid staff',
            'fldTheAmount.required'        => 'Please Enter Amount',
            'fldTheAmount.integer'        => 'Please Enter  valid Amount ',
            'fldHistory.required'        => 'Please Enter History ',
            'fldHistory.date'        => 'Please Enter valid History ',
        ];
    }
}
