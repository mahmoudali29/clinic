 
    <div class="modal-body clearfix ">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->

                    {!!Form::open(["url"=>"admin/reservations","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                <div class="col-md-9">
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Phone
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" name="fldPhone" id="fldPhone" data-required="1" required="required" class="form-control" value="{{ old('fldPhone') }}"  /> 
                                                <input type="hidden" name="fkPatientID" id="fkPatientID"  class="form-control" value="">
                                                <span  class="help-block help-block-error" id="name_show"></span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Doctors
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select  name="fkDoctorID" id="fkDoctorID" data-required="1" required="required" class="form-control" >
                                                <option value="">Select Doctor</option>
                                                @foreach ($arrStaff as $objStaff)
                                                <option value="{{ $objStaff->id}}">{{ $objStaff->name}}</option>
                                                @endforeach   
                                            </select> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="date" name="fldDate"  id="fldDate" data-required="1" required="required" class="form-control" value="{{ $fldDate }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Appointment 
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6" id="schedul">
                                                 
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Notes 
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <textarea  name="fldNotes"  class="form-control">{{ old('fldNotes') }}</textarea> 
                                            </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <span id="select-error" class="help-block help-block-error"></span>
                                </div>
                                   


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('reservations.index') }}" class="btn grey-salsa btn-outline">Back</a>
                                    </div>
                                </div>
                            </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
    </div>

    <script type="text/javascript">
        $('#fldPhone').change(function () {
            var fldPhone = $(this).val();
            if (fldPhone) 
            {
                $.ajax({ 
                        'url': "{{url('admin/reservations/get_patient_name')}}"+"/"+fldPhone.trim(),
                        'type': 'GET',
                        'success': function(data) { 
                            var container = $("#name_show");
                            if(data==0){
                                container.html("Didn't match. Please Enter Your Valid Phone");
                            }else{ 
                                container.html(data.objPatient.fldNameEN);
                                $('#fkPatientID').val(data.objPatient.pkPatientID);
                                $('button[type=submit]').prop('disabled', false);
                            }
                        }
                    });
                } else {
                    $("#name_show").empty();
            
                }
         });  
         </script>


 <script type="text/javascript">

$('#fkDoctorID').change(function () {
        var fkDoctorID = $(this).val();
        if (fkDoctorID!='') {
            $.ajax({ 
                'url': "{{url('admin/reservations/get_doctorworktime')}}"+"/"+fkDoctorID,
                'type': 'GET',
                'success': function(data) {
                    var container = $("#select-error"); 
                    container.html(data);
                }
                });
            };
            loadSchedul();
        });  
        function loadSchedul(){
            
        var fkDoctorID = $('#fkDoctorID').val();
        var fldDate     = $('#fldDate').val();
        if (fkDoctorID!='') {
            $.ajax({ 
                'url': "{{url('admin/reservations/get_schedul')}}"+"/"+fkDoctorID+'/'+fldDate,
                'type': 'GET', 
                'success': function(data) {
                    var container = $("#schedul");
                    container.html(data);
                }
                });
            };
        }

        $('#fldDate').change(function () {
            loadSchedul();
        });      
// sequence uncion
    function myBooking(data){
        var id = $("#t_" + data).text();
       document.getElementById("msg_c").innerHTML = "<div style=' color:green; font-size:20px;'>You Selected " +id +"</div>";
       document.getElementById('serial_no').value = id;        
    }     

</script>
<script type="text/javascript">
    var fldPhone = $('#fldPhone').val();
            if (fldPhone) 
            {
                $.ajax({ 
                        'url': "{{url('admin/reservations/get_patient_name')}}"+"/"+fldPhone.trim(),
                        'type': 'GET',
                        'success': function(data) { 
                            var container = $("#name_show");
                            if(data==0){
                                container.html("Didn't match. Please Enter Your Valid Phone");
                            }else{ 
                                container.html(data.objPatient.fldNameEN);
                                $('#fkPatientID').val(data.objPatient.pkPatientID);
                                $('button[type=submit]').prop('disabled', false);
                            }
                        }
                    });
                } else {
                    $("#name_show").empty();
            
                }
    var fkDoctorID = $('#fkDoctorID').val();
        if (fkDoctorID!='') {
            $.ajax({ 
                'url': "{{url('admin/reservations/get_doctorworktime')}}"+"/"+fkDoctorID,
                'type': 'GET',
                'success': function(data) {
                    var container = $("#select-error"); 
                    container.html(data);
                }
                });
            };
            loadSchedul();            
</script>
