<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'fldPhone'=>'required',
            'fkPatientID'=>'required',
            'fkDoctorID'=>'required',
            'fldDate'=>'required',
            'sequence'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'fldPhone.required' => "Please Enter Phone Number",
            'fkPatientID.required' => "Please Enter Phone Number Correct No Patient For This Number",
            'fkDoctorID.required' =>"Please Choose Doctor",
            'fldDate.required' =>"Please Enter Date",
            'sequence.required' =>"Please Choose Appointment",
        ];
    }
}
