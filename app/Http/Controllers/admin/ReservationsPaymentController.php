<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Reservation;
use App\Model\ReservationPayment;
use App\Model\Patient;
use App\Model\StaffWorking ;
use App\Model\Room ;
use App\Http\Requests\ReservationPaymentRequest;
use Redirect ;
use Session;
use DB;
use Auth;
class ReservationsPaymentController extends Controller
{ 
    public function __construct(){
        # check if admin login
        $this->middleware('auth:admin');
    }

    public function index(){
          
        $arrReservations = Reservation::all();
    	$strTitle = "Show Reservations";
    	return view('admin.reservationspayment.index',compact('strTitle','arrReservations'));

    }

    public function create(){
        
        $strTitle =  "Add New Reservation Payments" ;
        $arrReservations=Reservation::all();
    	return view('admin.reservationspayment.create' , compact('strTitle','arrReservations'));
    }
    public function PayReservation($id){
        $strTitle =  "Add New Reservation Payments" ;
        $objReservation=Reservation::find($id);
        $objReservationPayment=Reservation::join('tbl_reservations_payment', 'tbl_reservations.pkReservationID', '=', 'tbl_reservations_payment.fkReservationID')
        ->where('tbl_reservations.pkReservationID',$id)
        ->first();
    	return view('admin.reservationspayment.pay' , compact('strTitle','objReservation','objReservationPayment'));
    }
    public function SavePayReservation(ReservationPaymentRequest $request,$id){
    	try {
            dd($id);
            $objReservationPayment=new ReservationPayment();
            $objReservationPayment->fkReservationID=$id;
            $objReservationPayment->fldAmount=$request->input('fldAmount');
            $objReservationPayment->fldPaidAmount=$request->input('fldPaidAmount');
            $objReservationPayment->fldRemainingAmount=$request->input('fldRemainingAmount');
            $objReservationPayment->fldNotes=$request->input('fldNotes');
            $objReservationPayment->fldPaymentType=$request->input('fldPaymentType');
            $objReservationPayment->fkCreatedByUserID=Auth::user()->id;
            $objReservationPayment->save();        
            session()->flash('success' ,"Your Reservation Payment has been Added Successfully");
        } catch (\Exception $e) {
            session()->flash('error' ,trans('general.Please_check_data'));
        }
        return Redirect::back();
    }

    public function store(ReservationPaymentRequest $request){
    	try {
            
            $objReservationPayment=new ReservationPayment();
            $objReservationPayment->fkReservationID=$request->input('fkReservationID');
            $objReservationPayment->fldAmount=$request->input('fldAmount');
            $objReservationPayment->fldPaidAmount=$request->input('fldPaidAmount');
            $objReservationPayment->fldRemainingAmount=$request->input('fldRemainingAmount');
            $objReservationPayment->fldNotes=$request->input('fldNotes');
            $objReservationPayment->fldPaymentType=$request->input('fldPaymentType');
            $objReservationPayment->fkCreatedByUserID=Auth::user()->id;
            $objReservationPayment->save();        
            session()->flash('success' ,"Your Reservation Payment has been Added Successfully");
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

    public function getall(Request $request)
    {
        $columnsDefault = [
            'RecordID'                  => true,
            'fldAppointmentID'          => true,
            'fldDate'                   => true,
            'fldAppointmentTime'        => true,
            'fldPatientName'            => true,
            'fldPatientPhone'           => true,
            'fldDoctorName'             => true,
            'Status'                    => true,
            'Actions'                   => true,
        ];
        
        if ( isset( $request->columnsDef ) && is_array( $request->columnsDef ) ) {
            $columnsDefault = [];
            foreach ( $request->columnsDef as $field ) {
                $columnsDefault[ $field ] = true;
            }
        }
        //$alldata = Reservation::all();
        $alldata = Reservation::leftJoin('tbl_reservations_payment', 'tbl_reservations.pkReservationID', '=', 'tbl_reservations_payment.fkReservationID')->get();
        $alldataResult=array();
        $x=1;
        foreach($alldata as $objdata){
            if(  $objdata->fldRemainingAmount != '0' ){
                $status="<span class='label label-sm label-danger'> UnPaid  </span>";
                $link='<a href="'.url('admin/reservationspayment/pay')."/".$objdata->pkReservationID.'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> Pay</a>';
            }
            else{
                $status="<span class='label label-sm label-success'> Paid</span>";
                $link='<a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-check"></i> paid</a>';
            }
    
            $alldataResult[] = array(
                "RecordID" => $x,
                "fldAppointmentID" => $objdata->fldAppointmentID,
                "fldDate" => $objdata->fldDate,
                "fldAppointmentTime" =>$objdata->fldAppointment,
                "fldPatientName" =>$objdata->Patients->fldNameEN,
                "fldPatientPhone" => $objdata->Patients->fldPhone1,
                "fldDoctorName" => $objdata->Doctors->name,
                "Status" => $status,
                "Actions" => $link,

              );
              $x++;

        }
         
       // dd($alldataResult);
       $alldata =$alldataResult ;
        $data = [];
        // internal use; filter selected columns only from raw data
        foreach ( $alldata as $d ) {
            $data[] = $this->filterArray( $d, $columnsDefault );
        }
        
        
        // count data
        $totalRecords = $totalDisplay = count( $data );
        
        // filter by general search keyword
        if ( isset( $request->search ) ) {
            $data         =  $this->filterKeyword( $data, $request->search );
            $totalDisplay = count( $data );
        }
        
        if ( isset( $request->columns ) && is_array( $request->columns ) ) {
            foreach ( $request->columns as $column ) {
                if ( isset( $column['search'] ) ) {
                    $data         =  $this->filterKeyword( $data, $column['search'], $column['data'] );
                    $totalDisplay = count( $data );
                }
            }
        }
        
        // sort
        if ( isset( $request->order[0]['column'] ) && $request->order[0]['dir'] ) {
            $column = $request->order[0]['column'];
            $dir    = $request->order[0]['dir'];
            usort( $data, function ( $a, $b ) use ( $column, $dir ) {
                $a = array_slice( $a, $column, 1 );
                $b = array_slice( $b, $column, 1 );
                $a = array_pop( $a );
                $b = array_pop( $b );
        
                if ( $dir === 'asc' ) {
                    return $a > $b ? true : false;
                }
        
                return $a < $b ? true : false;
            } );
        }
        
        // pagination length
        if ( isset( $request->length ) ) {
            $data = array_splice( $data, $_REQUEST['start'], $request->length );
        }
        
        // return array values only without the keys
        if ( isset( $request->array_values ) && $request->array_values ) {
            $tmp  = $data;
            $data = [];
            foreach ( $tmp as $d ) {
               
                $data[] = array_values( $d );
            }
        }
        
        $secho = 0;
        if ( isset( $request->sEcho ) ) {
            $secho = intval( $request->sEcho );
        }
        
        $result = [
            'iTotalRecords'        => $totalRecords,
            'iTotalDisplayRecords' => $totalDisplay,
            'sEcho'                => $secho,
            'sColumns'             => '',
            'aaData'               => $data,
        ];
        
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        
        echo json_encode( $result, JSON_PRETTY_PRINT );
         
    }

    function filterArray( $array, $allowed = [] ) {
        return array_filter(
            $array,
            function ( $val, $key ) use ( $allowed ) { // N.b. $val, $key not $key, $val
                return isset( $allowed[ $key ] ) && ( $allowed[ $key ] === true || $allowed[ $key ] === $val );
            },
            ARRAY_FILTER_USE_BOTH
        );
    }
    
    function filterKeyword( $data, $search, $field = '' ) {
        $filter = '';
        if ( isset( $search['value'] ) ) {
            $filter = $search['value'];
        }
        if ( ! empty( $filter ) ) {
            if ( ! empty( $field ) ) {
                if ( strpos( strtolower( $field ), 'date' ) !== false ) {
                    // filter by date range
                    $data = filterByDateRange( $data, $filter, $field );
                } else {
                    // filter by column
                    $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                        return (boolean) preg_match( "/$filter/i", $a[ $field ] );
                    } );
                }
    
            } else {
                // general filter
                $data = array_filter( $data, function ( $a ) use ( $filter ) {
                    return (boolean) preg_grep( "/$filter/i", (array) $a );
                } );
            }
        }
    
        return $data;
    }
    
    function filterByDateRange( $data, $filter, $field ) {
        // filter by range
        if ( ! empty( $range = array_filter( explode( '|', $filter ) ) ) ) {
            $filter = $range;
        }
    
        if ( is_array( $filter ) ) {
            foreach ( $filter as &$date ) {
                // hardcoded date format
                $date = date_create_from_format( 'm/d/Y', stripcslashes( $date ) );
            }
            // filter by date range
            $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                // hardcoded date format
                $current = date_create_from_format( 'm/d/Y', $a[ $field ] );
                $from    = $filter[0];
                $to      = $filter[1];
                if ( $from <= $current && $to >= $current ) {
                    return true;
                }
    
                return false;
            } );
        }
    
        return $data;
    }


   

     
     

}
