<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class RoomRequest extends FormRequest
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
                $rules['fldNameAR'] = 'required|unique:tbl_rooms,fldNameAR|string';
                $rules['fldNameEN'] = 'required|unique:tbl_rooms,fldNameEN|string';
                $rules['fkBranchID'] = 'required|integer';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|unique:tbl_rooms,fldNameAR,'.Request::segment(3).',pkRoomID|string';
                $rules['fldNameEN'] = 'required|unique:tbl_rooms,fldNameEN,'.Request::segment(3).',pkRoomID|string';
                $rules['fkBranchID'] = 'required|integer';
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fldNameAR.required' => '  .من فضلك ادخل اسم الغرفه ',
            'fldNameEN.required' => 'Please Enter Room Name . ',
        ];
    }
}
