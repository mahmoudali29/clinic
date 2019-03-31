<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationPaymentRequest extends FormRequest
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
            'fkReservationID'=>'required',
            'fldAmount'=>'required',
            'fldPaymentType'=>'required',
            'fldPaidAmount'=>'required',
            'fldRemainingAmount'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'fkReservationID.required' => "Please Choose Reservation ",
            'fldAmount.required' => "Please Enter Reservation Amount",
            'fldPaymentType.required' =>"Please Choose Payment Method",
            'fldPaidAmount.required' =>"Please Enter Amount Paid",
            'fldRemainingAmount.required' =>"Please Enter Remainning",
        ];
    }
}
