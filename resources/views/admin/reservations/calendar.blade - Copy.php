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
            <small>{{$strTitle}}</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green sbold uppercase">Calendar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                             
                            <div class="col-md-12 col-sm-12">
                                <div id="calendar" class="has-toolbar"> </div>
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
    var AppCalendar = function() {

return {
//main function to initiate the module
init: function() {
this.initCalendar();
},

initCalendar: function() {

if (!jQuery().fullCalendar) {
   return;
}

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var h = {};

if (App.isRTL()) {
   if ($('#calendar').parents(".portlet").width() <= 720) {
       $('#calendar').addClass("mobile");
       h = {
           right: 'title, prev, next',
           center: '',
           left: 'agendaDay, agendaWeek, month, today'
       };
   } else {
       $('#calendar').removeClass("mobile");
       h = {
           right: 'title',
           center: '',
           left: 'agendaDay, agendaWeek, month, today, prev,next'
       };
   }
} else {
   if ($('#calendar').parents(".portlet").width() <= 720) {
       $('#calendar').addClass("mobile");
       h = {
           left: 'title, prev, next',
           center: '',
           right: 'today,month,agendaWeek,agendaDay'
       };
   } else {
       $('#calendar').removeClass("mobile");
       h = {
           left: 'title',
           center: '',
           right: 'prev,next,today,month,agendaWeek,agendaDay'
       };
   }
}

var initDrag = function(el) {
   // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
   // it doesn't need to have a start or end
   var eventObject = {
       title: $.trim(el.text()) // use the element's text as the event title
   };
   // store the Event Object in the DOM element so we can get to it later
   el.data('eventObject', eventObject);
   // make the event draggable using jQuery UI
   el.draggable({
       zIndex: 999,
       revert: true, // will cause the event to go back to its
       revertDuration: 0 //  original position after the drag
   });
};


$('#calendar').fullCalendar('destroy'); // destroy the calendar
$('#calendar').fullCalendar({ //re-initialize the calendar
   header: h,
   defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
   slotMinutes: 15,
   editable: false,
   droppable: false, // this allows things to be dropped onto the calendar !!!
   drop: function(date, allDay) { // this function is called when something is dropped

       // retrieve the dropped element's stored Event Object
       var originalEventObject = $(this).data('eventObject');
       // we need to copy it, so that multiple events don't have a reference to the same object
       var copiedEventObject = $.extend({}, originalEventObject);

       // assign it the date that was reported
       copiedEventObject.start = date;
       copiedEventObject.allDay = allDay;
       copiedEventObject.className = $(this).attr("data-class");

       // render the event on the calendar
       // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
       $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

       // is the "remove after drop" checkbox checked?
       if ($('#drop-remove').is(':checked')) {
           // if so, remove the element from the "Draggable Events" list
           $(this).remove();
       }
   },
   events: [
   <?php foreach ($arrReservations as $reservations) { 
       $time = strtotime($reservations->fldAppointment);
       $startTime = date("H:i", strtotime('-30 minutes', $time));
       $endTime = date("H:i", strtotime('+30 minutes', $time));
      ?>
 
   {
       title: '<?=$reservations->fkPatientID?> ( <?=$reservations->fkDoctorID?>)  ',
       start: '<?=$reservations->fldDate?> <?=$reservations->fldAppointment?>',
       end: '<?=$reservations->fldDate?> <?=$endTime?>',
       //start: new Date(y, m, d, 15, 30),
       allDay: !1,
       color: 'green',
       url:"{{ url('admin/reservations/') }}/{{ $reservations->pkReservationID }}/edit"
      
   },  
    <?php } ?>  
   ]
});

}

};

}();

jQuery(document).ready(function() {    
AppCalendar.init(); 
});
</script>



<script type="text/javascript">
    $(document).ready(function () {

        $("#calendar").fullCalendar({
            lang: 'en',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: "{{url('admin/reservations/calendar_events/1')}}",
            dayClick: function (date, jsEvent, view) {
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
            },
            eventClick: function (calEvent, jsEvent, view) {
                $("#show_event_hidden").attr("data-post-id", calEvent.encrypted_event_id);
                $("#show_event_hidden").attr("data-post-cycle", calEvent.cycle);
                $("#show_event_hidden").trigger("click");
            },
            eventRender: function (event, element) {
                if (event.icon) {
                    element.find(".fc-title").prepend("<i class='fa " + event.icon + "'></i> ");
                }
            },
            firstDay: 0

        });

        var client = "1";
        if (client) {
            setTimeout(function () {
                $('#calendar').fullCalendar('today');
            });
        }
        
        
        //autoload the event popover
        var encrypted_event_id = "<?php echo isset($encrypted_event_id)? $encrypted_event_id:'';?>";
       
        if(encrypted_event_id){
            $("#show_event_hidden").attr("data-post-id", encrypted_event_id);
            $("#show_event_hidden").trigger("click"); 
        }
        

    });
</script>

@endsection <!--END  CONTENT SECTION-->
            