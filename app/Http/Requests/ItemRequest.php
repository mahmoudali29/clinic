<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ItemRequest extends FormRequest
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
                $rules['fldTitleAR'] = 'required|unique:tbl_items,fldTitleAR|string';
                $rules['fldTitleEN'] = 'required|unique:tbl_items,fldTitleEN|string';
                $rules['fldType'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldTitleAR'] = 'required|unique:tbl_items,fldTitleAR,'.Request::segment(3).',pkItemID|string';
                $rules['fldTitleEN'] = 'required|unique:tbl_items,fldTitleEN,'.Request::segment(3).',pkItemID|string';
                $rules['fldType'] = 'required';
            }
        }
        return $rules;

         
    }


    public function messages()
    {
        return [
            'fldTitleAR.required' =>   trans('general.Please_enter_Title_ar'),
            'fldTitleAR.unique' =>   trans('general.this_titleAr_exist_try_again'),
            'fldTitleEN.required' => trans('general.Please_enter_Title_en'),
            'fldTitleEN.unique' => trans('general.this_titleEn_exist_try_again'),
            'fldType.required' => trans('general.Please_choose_type'),
        ];
    }
}
