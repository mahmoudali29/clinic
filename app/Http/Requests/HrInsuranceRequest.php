<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HrInsuranceRequest extends FormRequest
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
                $rules['fldBasicMin'] = 'required';
                $rules['fldBasicMax'] = 'required';
                $rules['fldVariableMin'] = 'required';
                $rules['fldVariableMax'] = 'required';
                $rules['Start_Date'] = 'required|date';
                $rules['End_Date'] = 'required|date';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldBasicMin'] = 'required';
                $rules['fldBasicMax'] = 'required';
                $rules['fldVariableMin'] = 'required';
                $rules['fldVariableMax'] = 'required';
                $rules['Start_Date'] = 'required|date';
                $rules['End_Date'] = 'required|date';

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
