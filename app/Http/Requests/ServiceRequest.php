<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ServiceRequest extends FormRequest
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
                $rules['fldServiceNameAR'] = 'required|unique:tbl_services,fldServiceNameAR|string';
                $rules['fldServiceNameEN'] = 'required|unique:tbl_services,fldServiceNameEN|string';
                $rules['fldPrice'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldServiceNameAR'] = 'required|unique:tbl_services,fldServiceNameAR,'.Request::segment(3).',pkServiceID|string';
                $rules['fldServiceNameEN'] = 'required|unique:tbl_services,fldServiceNameEN,'.Request::segment(3).',pkServiceID|string';
                $rules['fldPrice'] = 'required';
            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [
            'fldServiceNameAR.required' =>  'Please Enter Service  Name AR',
            'fldServiceNameAR.unique' =>  'This Service Name AR Already Exist Please Try Again',
            'fldServiceNameEN.required' => 'Please Enter Service  Name EN',
            'fldServiceNameEN.unique' => 'This Service Name EN Already Exist Please Try Again',
            'fldPrice.required' => 'Please Enter Service  Price',
        ];
    }
}
