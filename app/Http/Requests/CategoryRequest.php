<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class CategoryRequest extends FormRequest
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
        $rules = array(
                'StrName'       => 'required|max:255',
            );

        if(!empty(Input::get('FkParentID'))){
            $rules['FkParentID'] = 'integer';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'StrName.required' => 'Category Name is required',  
        ];
    }
}
