<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Reservation;
use App\Model\Patient;
use App\Model\StaffWorking ;
use App\Model\Room ;
use App\Http\Requests\ReservationRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class ReservationsController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrReservations = Reservation::all();
    	$strTitle = "Show Reservations";
    	return view('admin.reservations.index',compact('strTitle','arrReservations'));

    }

    public function create(){
        
        $strTitle =  "Add New Reservations" ;
        $arrStaff=Admin::where('type',Admin::TYPE_STAFF)->get();
    	return view('admin.reservations.create' , compact('strTitle','arrStaff'));
    }

    public function store(ReservationRequest $request){
    	try {
            $arrRooms=  $arrRooms = Room::all();
            $roomID=0;
            foreach($arrRooms as $objRooms){
                $checkAvailabilityRoom=$this->chackRoom($objRooms->pkRoomID,$request->input('fldDate'),$request->input('sequence'));
                if(count($checkAvailabilityRoom)==0){
                     $roomID=$objRooms->pkRoomID;
                     break;
                 }
            }
            if($roomID==0){
                session()->flash('error' ,"All Room Are Reservered");
                return Redirect::back();
            }
            $appointment_id = "A".date('y').strtoupper($this->randstrGen(5));
            $objReservation=new Reservation();
            $objReservation->fkPatientID=$request->input('fkPatientID');
            $objReservation->fkDoctorID=$request->input('fkDoctorID');
            $objReservation->fldDate=$request->input('fldDate');
            $objReservation->fldAppointment=$request->input('sequence');
            $objReservation->fldNotes=$request->input('fldNotes');
            $objReservation->fldAppointmentID=$appointment_id;
            $objReservation->fkRoomID=$roomID;
            $objReservation->fkCreatedByUserID=Auth::user()->id;
            $objReservation->save();        
            session()->flash('success' ,"Your Reservation has been Added Successfully");
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function edit($id){

        $objReservation = Reservation::find($id) ;
        $arrStaff=Admin::where('type',Admin::TYPE_STAFF)->get();
    	$strTitle =  "Edit Reservation";
    	return view('admin.reservations.edit' , compact('objReservation' , 'strTitle','arrStaff')) ;
    }


    public function update(ReservationRequest $request , $id) {

    	try {
            Reservation::find($id)->update(request()->all());

            $arrRooms=  $arrRooms = Room::all();
            $roomID=0;
            foreach($arrRooms as $objRooms){
                $checkAvailabilityRoom=$this->chackRoom($objRooms->pkRoomID,$request->input('fldDate'),$request->input('sequence'));
                if(count($checkAvailabilityRoom)==0){
                     $roomID=$objRooms->pkRoomID;
                     break;
                 }
            }
            if($roomID==0){
                session()->flash('error' ,"All Room Are Reservered");
                return Redirect::back();
            }
            $objReservation= Reservation::find($id);
            $objReservation->fkPatientID=$request->input('fkPatientID');
            $objReservation->fkDoctorID=$request->input('fkDoctorID');
            $objReservation->fldDate=$request->input('fldDate');
            $objReservation->fldAppointment=$request->input('sequence');
            $objReservation->fldNotes=$request->input('fldNotes');
            $objReservation->fkRoomID=$roomID;
            $objReservation->save(); 

            session()->flash('success' ,"Your Reservation has been Updated Successfully");
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
         
        try { 
            Reservation::find($id)->delete();
            Session::flash('message' , trans('general.successfuly_deleted'));
        } catch (\Exception $e){
            Session()->flash('message' ,trans('general.Error_in_Deleted'));
        }
        return Redirect::back();
    }

    public function GetpatientName($fldPhone)
    {
        $objPatient = Patient::where('fldPhone1',$fldPhone)->orWhere('fldPhone2',$fldPhone)->latest()->first();
        if(!empty($objPatient)) {
            return response()->json(['objPatient'=>$objPatient]);
         } else {
            return 0; 
         } 
         
    }

    public function GetDoctorsWorkingTime($fkDoctorID)
    {    
        $arrStaffWorking = StaffWorking::where('fkStaffID',$fkDoctorID)->get();
        echo "Doctor's Appointments <br/>";
        if(!empty($arrStaffWorking)) {
            foreach ($arrStaffWorking as $objStaffWorking) 
             {
                echo  '<button style="margin:1px;"   type="button" required="required" class="btn blue"  >'.$objStaffWorking->fldDay.' <br/> From '. date('h:i:s a', strtotime($objStaffWorking->fldFromHour)).' To '.date('h:i:s a', strtotime($objStaffWorking->fldToHour)).'</button><br/>';
              }
         } else {
           echo 0; 
         } 

    }

    public function GetDoctorSchedul($fkDoctorID=NULL,$fldDate=NULL)
    {    
        $re = $this->chackSchedulDate_doctor($fkDoctorID,$fldDate);    
        if($re==TRUE){
            $result1 = $this->chackSchedulDate($fkDoctorID,$fldDate);
            if($result1)
            {
                $start_time = strtotime($result1->fldFromHour);
                $end_time = strtotime($result1->fldToHour);
                $total_m =  round(abs($end_time- $start_time) / 60,2);
                $per_patient_time = $total_m / $result1->fldPatientTime;

                echo '<div id="msg_c"> Please Select One Appointment </div>'; 
                        for ($i = 1; $i <= $per_patient_time; $i++) 
                        {
                          $m_time = $i-1;
                          $time = ($m_time * $result1->fldPatientTime);
                          $patient_time =date('h:i A', strtotime($result1->fldFromHour)+$time*60);
                           $button_color = $this->Appointment_checker($fkDoctorID,$fldDate,$patient_time);
                            if ($button_color == 'btn-danger') {
                                echo '<button type="button" disabled class="btn '.$button_color.'">'.$patient_time.'</button>';
                              } else {
                              echo '<button style="margin:1px;" id="t_'.$i.'" type="button" required="required" class="btn blue" onclick="myBooking('.$i.')">'.$patient_time.'</button>';
                            }
                        }

              echo '<input type="hidden" name="sequence" id="serial_no" value="">';
              echo '<input type="hidden" name="schedul_id" value="' . $result1->pkStaffWorktimeID . '" required>';
      
            }else{
               echo'
                <div class="col-md-12">
                    <div class="alert alert-danger"><strong>MESSAGGIO DI ERRORE!</strong>                       
                    <p>There have no time schedule setup! Please Try Again.</p></div>
                </div>';
            }               

          }else{

             echo'<div class="col-md-12">
                <div class="alert alert-danger">
                   <strong>ERROR MESSAGE!</strong>  
                   <h4>Doctor do not seat In this date!</h4>
                </div>

            </div>';

          }

    }
     
    public function chackSchedulDate_doctor($doctor_id,$date)
    {    
        $day = date("l",strtotime($date));
        $objStaffWorking = StaffWorking::where('fkStaffID',$doctor_id)->where('fldDay',$day)->latest()->first();
        if($objStaffWorking){
            $r = $objStaffWorking;
        return $r;
        }else{
        return FALSE;
        }

    }
    public function chackSchedulDate($doctor_id,$date)
    {   
        if(!empty($date)){ 
            $day = date("l",strtotime($date));
        }else{
            $day = '';
        }
        $objStaffWorking = StaffWorking::where('fkStaffID',$doctor_id)->where('fldDay',$day)->latest()->first();
        if($objStaffWorking){
            $r = $objStaffWorking;
        return $r;
        }else{
        return FALSE;
        }

    }

    public function Appointment_checker($doctor_id,$date,$sequence) 
    { 

        $arrReservation = Reservation::where('fkDoctorID',$doctor_id)->where('fldDate',$date)->where('fldAppointment',$sequence)->get();
        
        if (count($arrReservation) !=0) {
            return 'btn-danger';
        } else {
            return 'btn-primary';
        }

    }
    public function randstrGen($len) 
    {
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }

    public function chackRoom($roomID,$date,$appointment)
    {
        $arrReservation = Reservation::where('fkRoomID',$roomID)->where('fldDate',$date)->where('fldAppointment',$appointment)->get();
        return $arrReservation;
    }

    public function calendar(){
          
        $arrReservations = Reservation::all();
    	$strTitle = "Reservations Calendar";
    	return view('admin.reservations.calendar',compact('strTitle','arrReservations'));

    }

    public function modal_form(Request $request) { //dsdds
        $strTitle =  "Add New Reservations" ;
        $arrStaff=Admin::all();
        $fldDate=$request->start_date;
        return view('admin.reservations.modal_form',compact('strTitle','arrStaff','fldDate'));    
    }

    public function CalendarReservations(){

        $list_data = Reservation::all();
        $result = array();
        foreach ($list_data as $data) {

            //check if this recurring event, generate recurring evernts based on the condition

            $data->cycle = 0; //it's required to calculate the recurring events

            $result[] = $this->_make_calendar_event($data); //add regulary event
        }
        echo json_encode($result);
    }

    private function _make_calendar_event($data) {

        return array(
            "title" => $data->Patients->fldNameEN ." ( " .$data->Doctors->name. " )",
            "icon" => "fa-lock",
            "start" => $data->fldDate . " " . $data->fldAppointment,
            "end" => $data->fldDate . " " . date('h:i:s a', strtotime("+20 minutes", strtotime($data->fldAppointment))),
            "encrypted_event_id" => encrypt($data->pkReservationID), //to make is secure we'll use the encrypted id
            "backgroundColor" =>"#37b4e1",
            "borderColor" => "#37b4e1",
            "cycle" => $data->cycle,
        );
    }

    public function ViewReservation(Request $request) { //dsdds
        $strTitle =  "Add New Reservations" ;
        $arrStaff=Admin::all();
        $id=decrypt($request->id);
        $objReservation=Reservation::find($id);
        
        return view('admin.reservations.view',compact('strTitle','arrStaff','objReservation','id'));    
    }

     


    






}
