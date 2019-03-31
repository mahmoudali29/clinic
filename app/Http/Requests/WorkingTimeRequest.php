<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class WorkingTimeRequest extends FormRequest
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
                $rules['fldDay'] = 'required';
                $rules['fldFromHour'] = 'required';
                $rules['fldToHour'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldDay'] = 'required';
                $rules['fldFromHour'] = 'required';
                $rules['fldToHour'] = 'required';
            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [
            'fldDay.required' =>   "Please Select Day ",
            'fldFromHour.required' => "Please Enter From Hour",
            'fldToHour.required' => "Please Enter To Hour",
        ];
    }
}
