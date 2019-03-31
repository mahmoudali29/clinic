<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HrSalaryRequest extends FormRequest
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
                $rules['Salary'] = 'required|integer';
                $rules['Start_Date'] = 'required|date';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fkStaffID'] = 'required';
                $rules['Salary'] = 'required|integer';
                $rules['Start_Date'] = 'date';

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
