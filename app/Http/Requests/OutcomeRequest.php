<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutcomeRequest extends FormRequest
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
        return [
            'fkItemID'=>'required',
            'fldAmount'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'fkItemID.required' =>   trans('finance.Please_choose_item'),
            'fldAmount.required' => trans('finance.Please_enter_amount'),
        ];
    }
}
