<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HrLoanPaymentRequest extends FormRequest
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
                $rules['fldAmount'] = 'required|numeric|min:1'; //|max:$available
                // $rules['fkLoanID'] = 'required';
                $rules['fldDate'] = 'required|date';
            }
            case 'PUT':
            case 'PATCH':
            {
                // $rules['fldAmount'] = 'required|numeric';
                // // $rules['fkLoanID'] = 'required';
                // $rules['fldDate'] = 'required|date';

            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [
            'fldAmount.required' => 'Amount is required',
            'fldAmount.numeric' => 'Amount must be a numeric value',
            'fldDate.required' => 'This Field is required',
            'fkLoanID.required' => 'This Field is required',
            'fldDate.date' => 'This Field must be Date',
        ];
    }
}
