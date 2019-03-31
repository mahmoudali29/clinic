<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'StrCompanyName' => 'required|max:255' ,
             'StrName' => 'required|max:255' ,
             'StrPosition' => 'required|max:255' ,
             'IntMobile' => 'required|max:255' ,
             'IntPhone' => 'required|max:255' ,
             'StrCountry' => 'required|max:255' ,
             'TxtNotes' => 'required|max:500' ,
        ];
    }

    public function messages()
    {
        return [
            'StrCompanyName.required' => 'Company Name is Required' ,
            'StrName.required' => 'Name is Required' ,
            'StrPosition.required' => 'Position  is Required' ,
            'IntMobile.required' => 'Mobile  is Required' ,
            'IntPhone.required' => 'Phone  is Required' ,
            'StrCountry.required' => 'Country  is Required' ,
            'TxtNotes.required' => 'Notes  is Required' ,
        ];
    }
}
