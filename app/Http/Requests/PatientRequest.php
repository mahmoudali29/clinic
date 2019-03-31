<?php

namespace App\Http\Requests;
use App\Model\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class PatientRequest extends FormRequest
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
        $objPatient = new Patient;
        $rules = array();
        switch ($this->method()) {
            case 'POST':
            {
                $rules['fldNameAR'] = 'required|string';
                $rules['fldNameEN'] = 'required|string';
                $rules['fldPhone1'] = 'required|unique:tbl_patients,fldPhone1|string|max:25';
                // $rules['fldPhone2'] = 'string|max:25';
                $rules['fldGender'] = 'required|in:'.Patient::GENDER_MALE. ','.Patient::GENDER_FEMALE;
                $rules['fldAddressAR'] = 'required|string';
                $rules['fldAddressEN'] = 'required|string';
                $rules['fldDateOfBirth'] = 'required';
                // $rules['fldEmail'] = 'unique:tbl_patients,fldEmail|max:255';
                // $rules['fldEmail'] = 'unique:tbl_patients,fldEmail|max:255';
                $rules['fldPhoto'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
                $rules['fkCountryID'] = 'required';
                $rules['fkAreaID'] = 'required';
                $rules['fkCityID'] = 'required';
                $rules['fkBranchID'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['fldNameAR'] = 'required|string';
                $rules['fldNameEN'] = 'required|string';
                $rules['fldPhone1'] = 'required|unique:tbl_patients,fldPhone1,'.Request::segment(3).',pkPatientID|string|max:25';
                // $rules['fldPhone2'] = 'string|max:25';
                $rules['fldGender'] = 'required|in:'.Patient::GENDER_MALE. ','.Patient::GENDER_FEMALE;
                $rules['fldAddressAR'] = 'required|string';
                $rules['fldAddressEN'] = 'required|string';
                $rules['fldDateOfBirth'] ='required';
                // $rules['fldEmail'] = 'unique:tbl_patients,fldEmail,'.Request::segment(3).',pkPatientID|max:255';
                // $rules['fldEmail'] = 'unique:tbl_patients,fldEmail,'.Request::segment(3).',pkPatientID|max:255';
                $rules['fldPhoto'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
                $rules['fkCountryID'] = 'required';
                $rules['fkAreaID'] = 'required';
                $rules['fkCityID'] = 'required';
                $rules['fkBranchID'] = 'required';
            }
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'fldNameAR.required' => '.من فضلك ادخل اسمك ',
            'fldNameAR.string' => '.من فضلك ادخل الاسم صحيحا ',
            'fldAddressAR.required' => '.من فضلك ادخل عنوانك ',
            'fldAddressAR.string' => '.من فضلك ادخل العنوان صحيحا ',
            'fldNameEN.required' => 'Please Enter Your Name',
            'fldNameEN.string' => 'Please Enter Your Name Correctly',
            'fldAddressEN.required' => 'Please Enter Your Address',
            'fldAddressEN.string' => 'Please Enter Your Address Correctly',
            'fldEmail.unique' => 'Please Enter Your Another Email',
            'fldGender.required' => 'Please Enter Your Gender',
            'fldPhone1.required' => 'Please Enter Your Phone1',
            'fldPhone1.string' => 'Please Enter Your Phone1 Valid',
            'fldPhone1.unique' => 'This Phone1 Number Is Unavailable ',
            'fldPhone1.max' => "Phone1 Doesn't limit 25 Numbers" ,
            'fldPhone2.max' => "Phone2 Doesn't limit 25 Numbers" ,
            'fldPhone2.string' => "Please Enter Your Phone2 Valid" ,
            'fkAreaID.required' => 'Please Select Area Name',
            'fkCountryID.required' => 'Please Select Country Name',
            'fkCityID.required' => 'Please Select City Name',
            'fkBranchID.required' => 'Please Select Branch Name',
        ];
    }
}
