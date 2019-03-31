<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HrAllowanceRequest extends FormRequest
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
                $rules['fkStaffID'] = 'required';
                $rules['Allowance'] = 'required|integer';
                $rules['fldType'] = 'required|string';
                // $rules['Start_Date'] = 'required|date';
                // $rules['End_Date'] = 'required|date';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fkStaffID'] = 'required';
                $rules['Allowance'] = 'required|integer';
                $rules['fldType'] = 'required|string';
                // $rules['Start_Date'] = 'required|date';
                // $rules['End_Date'] = 'required|date';

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
