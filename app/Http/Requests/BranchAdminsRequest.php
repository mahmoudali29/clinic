<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BranchAdminsRequest extends FormRequest
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
    public function rules(Request $Request)
    {
        $rules = array();
        switch ($this->method()) {
            case 'POST':
            {
                $rules['fkBranchID'] = 'integer';
                $rules['fkAdminID'] = 'integer';
                
                
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fkBranchID'] = 'integer';
                $rules['fkAdminID'] = 'integer';
               
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fkBranchID.required' => 'Please Select Branch Name',
            'fkAdminID.required' => 'Please Select Admin Name ',
           
        ];
    }
}
