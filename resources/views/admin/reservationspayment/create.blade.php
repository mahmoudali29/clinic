@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<!-- BEGIN PAGE BAR -->
<style>
    .star-color{
        color: red;
    }
</style>
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin/dashboard') }}">{{trans('general.Home')}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('admin/reservationspayment') }}">Reservations Payment</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span>{{ $strTitle }}</span>
            </li>
        </ul>
        <div class="page-toolbar" style="display:none">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> {{ $strTitle }}
        <small style="display:none">form validation</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->

    @if( $flash = session('success') )
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
        </div>
    @endif
    
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

    @if($flash= session('error'))
    <div class="alert alert-danger">
        <strong>{{session('error')}}</strong>
    </div>
    @endif


  <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Phone Number<span class="star-color">*</span></label>
        <input type="text" class="form-control" placeholder="Phone Number">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Patient Name<span class="star-color">*</span> </label>
        <input type="text" class="form-control" placeholder="Patient Name">
      </div>
    </div>
    <div class="form-group col-md-12">
      <label for="inputAddress">Address<span class="star-color">*</span></label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Date<span class="star-color">*</span></label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-6">
        <label for="inputState">Doctor<span class="star-color">*</span></label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
    </div>
    <div class="table table-responsive col-md-12">
    <table class="table table-responsive table-striped table-bordered">
      <thead  id="TextBoxContainer">
          <tr>
            <th scope="col">Service Info<span class="star-color">*</span></th>
            <th scope="col">Quantity<span class="star-color">*</span></th>
            <th scope="col">Price<span class="star-color">*</span></th>
            <th scope="col">Discount<span class="star-color">*</span></th>
            <th scope="col">Total<span class="star-color">*</span></th>
            <th scope="col">Action</th>
          </tr>
        </thead>
    <tbody>
        <tr>
            <td>
              <input type="text" class="form-control" placeholder="Service Name">
            </td>
            <td>
              <input type="text" class="form-control" placeholder="1">
            </td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
            <td>
              <button class="btn btn-danger remove">Delete</button>
            </td>
          </tr>

          <tr>
            <td colspan="4">Total Tax:</td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
          </tr>
          <tr>
            <td colspan="4">Grand Total:</td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
          </tr>
          <tr>
            <td colspan="4">Paid Ammount:</td>
            <td>
              <input type="text" class="form-control" placeholder="00:00">
            </td>
          </tr>

          <tr>
              <td class="text-center">
                  <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls">Add And Paid</button>
              </td>
              <td colspan="3">Due:</td>
              <td>
                <input type="text" class="form-control" placeholder="00:00">
              </td>
            </tr>
    </tbody>
    </table>
    </div>
    <div class="form-group col-md-12">
        <label for="exampleFormControlTextarea3">Payment Notes<span class="star-color">*</span></label>
        <textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
      </div>
      <div class="form-group col-md-12">
        <label for="inputState">Select payment method<span class="star-color">*</span></label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="exampleFormControlTextarea3">Payment Method Notes<span class="star-color">*</span></label>
        <textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
      </div>
      <div class="text-center">
          <button id="btnAdd" type="button" class="btn btn-info" data-toggle="tooltip" data-original-title="Add more controls">Add and paid</button>
      </div>
  </form>


	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script>
			$(function () {
				$("#btnAdd").bind("click", function () {
						var div = $("<tr />");
						div.html(GetDynamicTextBox(""));
						$("#TextBoxContainer").append(div);
				});
				$("body").on("click", ".remove", function () {
						$(this).closest("tr").remove();
				});
		});
		function GetDynamicTextBox(value) {
				return '<td><input name = "DynamicTextBox" type="text" placeholder="Service Name" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" placeholder="1" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" type="text" placeholder="00:00" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" type="text" placeholder="00:00" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" type="text" placeholder="00:00" value = "' + value + '" class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger remove">Delete</button></td>'
		}
	</script>



    </div>
        <!-- END CONTENT BODY -->
    </div>

    <script type="text/javascript">
        $('#fldPaidAmount').change(function () {
         var fldPaidAmount = $(this).val();
         var fldAmount=$("#fldAmount").val();
         var fldRemainingAmount=fldAmount-fldPaidAmount;
         $("#fldRemainingAmount").val(fldRemainingAmount);
      
         });  
    </script>
    <script type="text/javascript">
        $('#fldAmount').change(function () {
         var fldAmount = $(this).val();
         var fldPaidAmount=$("#fldPaidAmount").val();
         var fldRemainingAmount=fldAmount-fldPaidAmount;
         $("#fldRemainingAmount").val(fldRemainingAmount);
      
         });  
    </script>

    

@endsection <!--END  CONTENT SECTION-->
