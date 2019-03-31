@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<!-- BEGIN PAGE BAR -->
@section('content')
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('admin/dashboard') }}">{{trans('general.Home')}}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ url('admin/reservations') }}">Reservations</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>{{$strTitle}}</span>
                </li>
            </ul>
             
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> {{$strTitle}}
            <small>
                 
                <a href="#" class="btn btn-default" title="Add Reservation" data-post-client_id="" data-act="ajax-modal" data-title="Add Reservation" data-action-url="{{url('admin/reservations/modal_form')}}"><i class='fa fa-plus-circle'></i> Add event</a>                
                <a href="#" class="hide" id="add_event_hidden" title="Add Reservation" data-post-client_id="" data-act="ajax-modal" data-title="Add Reservation" data-action-url="{{url('admin/reservations/modal_form')}}"></a>                
                <a href="#" class="hide" id="show_event_hidden" data-post-client_id="" data-post-cycle="0" data-post-editable="1" title="Reservation details" data-act="ajax-modal" data-title="Reservation details" data-action-url="{{url('admin/reservations/view')}}"></a>
            </small>
        </h3>
        

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered calendar">
                    <div class="portlet-title">
                        <div class="caption">
                             
                             
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                             
                            <div class="col-md-12 col-sm-12">
                                <div id="calendar" class="has-toolbar"> </div>
                            </div>

                            

                            <div  class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="ajaxModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="ajaxModalTitle" data-title="Add Reservation"></h4>
                                        </div>
                                        <div id="ajaxModalContent">
                            
                                        </div>
                                        <div id='ajaxModalOriginalContent' class='hide'>
                                            <div class="original-modal-body">
                                                <div class="circle-loader"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<script type="text/javascript">
    $(document).ready(function () {

        $("#calendar").fullCalendar({
            lang: AppLanugage.locale,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            
            events: "{{url('admin/reservations/calendar_reservations')}}",
            dayClick: function (date, jsEvent, view) {
                var check = date.format("YYYY-MM-DD");
                var today =moment($('#calendar').fullCalendar('getDate')).format('YYYY-MM-DD');
               
                if(check < today)
                {
                    alert('Please Select New Date  Start From Today');
                }
                else{
                    //do something
                    $("#add_event_hidden").attr("data-post-start_date", date.format("YYYY-MM-DD"));
                    var startTime = date.format("HH:mm:ss");
                    if (startTime === "00:00:00") {
                        startTime = "";
                    }
                    $("#add_event_hidden").attr("data-post-start_time", startTime);
                    var endDate = date.add(1, 'hours');

                    $("#add_event_hidden").attr("data-post-end_date", endDate.format("YYYY-MM-DD"));
                    var endTime = "";
                    if (startTime != "") {
                        endTime = endDate.format("HH:mm:ss");
                    }

                    $("#add_event_hidden").attr("data-post-end_time", endTime);
                    $("#add_event_hidden").trigger("click");
                }

               
            },

            eventClick: function (calEvent, jsEvent, view) {
                
                var check = moment(calEvent.start).format('YYYY-MM-DD');
                var today =moment($('#calendar').fullCalendar('getDate')).format('YYYY-MM-DD');
                if(check < today)
                {
                    alert("You Can't Change Old Reservation");
                }
                else{
                    $("#show_event_hidden").attr("data-post-id", calEvent.encrypted_event_id);
                    $("#show_event_hidden").attr("data-post-cycle", calEvent.cycle);
                    $("#show_event_hidden").trigger("click");
                }
               
            },
            eventRender: function (event, element) {
                if (event.icon) {
                    element.find(".fc-title").prepend("<i class='fa " + event.icon + "'></i> ");
                }
            },
            firstDay: 0

        });

         
        
        //autoload the event popover
        var encrypted_event_id = "<?php echo isset($encrypted_event_id)? $encrypted_event_id:'';?>";
       
        if(encrypted_event_id){
            $("#show_event_hidden").attr("data-post-id", encrypted_event_id);
            $("#show_event_hidden").trigger("click"); 
        }
        

    });
</script>

 
 

@endsection <!--END  CONTENT SECTION-->
            