@extends('layouts.admin')
@section('content')
 <!-- /.content-header -->
 <script src="https://promotionalwears.com/invoice/assets/js/countryCode.js" type="text/javascript"></script>
    <link href="https://promotionalwears.com/invoice/assets/bootstrap/css/countryCode.css" rel="stylesheet" media="screen">
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Client Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Client Details</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <!-- /.content-header -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-primary">
                    <div class="card-header">
                <h3 class="card-title">Enter Client Details</h3>
              </div>
                    <!-- form start -->
                    <form role="form" id="addClient" action="{{ route('client.update', $client->id)}}" method="post" role="form">
					<input type="hidden" name="_method" value="PUT">
                    	@csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Client Name</label>
                                        <input type="text" class="form-control required" id="client_name" name="client_name" value="{{ $client->client_name }}">
										<span class="text-danger">
										@if ($errors->has('client_name'))
										  {{ $errors->first('client_name') }}
									    @endif
									 </span>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Client Company</label>
                                        <input type="text" class="form-control required" id="client_company" name="client_company" value="{{$client->client_company}}">
										<span class="text-danger">
										@if($errors->has('client_company'))
											{{$errors->first('client_company')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">Client Email</label>
                                        <input type="email" class="form-control required " id="client_email" name="client_email" value="{{$client->client_email}}">
										<span class="text-danger">
										@if($errors->has('client_email'))
											{{$errors->first('client_email')}}
										@endif
										</span>
                                    </div>
                                    <div class="result" id="result"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cpassword">Client Contact</label>
                                         <input type="text" class="form-control required" id="client_contact" name="client_contact" value="{{$client->client_mobile}}">
                                        <span class="text-danger">
										@if($errors->has('client_contact'))
											{{$errors->first('client_contact')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Client's Company Gst Number</label>
                                        <input type="text" class="form-control " id="client_gst" name="client_gst" value="{{$client->client_gst}}">
										<span class="text-danger">
										@if($errors->has('client_gst'))
											{{$errors->first('client_gst')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Client Address</label>
                                        <input type="text" class="form-control required" id="client_address" name="client_address" value="{{$client->client_address}}">
										<span class="text-danger">
										@if($errors->has('client_address'))
											{{$errors->first('client_address')}}
										@endif
										</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" id="india">
                                        <label for="password">Pincode</label>
                                        <input type="text" class="form-control required digits" id="client_pincode" name="client_pincode" value="{{$client->client_pincode}}">
										<span class="text-danger">
										@if($errors->has('client_pincode'))
											{{$errors->first('client_pincode')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Client State</label>
                                        <!--<input type="text" class="form-control required" id="client_state" name="client_state" Placeholder="i.e Delhi,Punjab etc..">-->
                                        <select class="form-control required" id="client_state" name="client_state">
                                            <option value="">Choose one</option>
                                            @php
                                            
                                            $products = array("Other","Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh","Chandigarh", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala","Ladakh" ,"Madya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telagana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal", "Andaman and Nicobar Islands", "Dadar and Nagar Haveli", "Daman and Diu", "Lakshadeep", "Pondicherry");
                                            $selected = '';
											@endphp
                                            
											@foreach($products as $item)
												
                                              <option value="{{$item}}" 
												@if($client->client_state == $item)
													Selected
												@endif >{{ $item}}
												</option>
                                            @endforeach
										</select>
										<span class="text-danger">
										@if($errors->has('client_state'))
											{{$errors->first('client_state')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-6" id="other_state_div" style="display:none">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="float:left">
                                        <div class="form-group" >
                                            <label >Enter State</label>
                                            <input type="text" class="form-control" id="other_state" name="other_state" value="{{$client->other_state}}">
											<span class="text-danger">
											@if($errors->has('other_state'))
												{{$errors->first('other_state')}}
											@endif
											</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="float:left">
                                        <div class="form-group" >
                                            <label >Enter Country</label>
                                            <input type="text" class="form-control" id="client_country" name="client_country" value="{{$client->client_country}}" >
											<span class="text-danger">
											@if($errors->has('client_country'))
												{{$errors->first('client_country')}}
											@endif
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" id="submit"/>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
        <!-- /.card -->
       </div>
    </div>
</section>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script>
 var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");
// initialise plugin
telInput.intlTelInput({
  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "in",
  ipinfoToken: "yolo",
  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['in', 'ae', 'us','uk','au','gb'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
   //utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});
var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};
// on blur: validate
telInput.blur(function() {
  reset();
  //alert();
  var countrycode = $('.selected-dial-code').text();
  var phone = $('#phone').val();
  $('#contact').val(countrycode +'-'+ phone);
});
// on keyup / change flag: reset
telInput.on("keyup change", reset);
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
	/*jQuery('#client_email').on('blur', function() {
		
        var email = $(this).val();
		alert(email);
        $.ajax({
            type: "POST",
            url: '{{url("client/checkemail")}}',
            data: {email:email},
            dataType: "json",
            success: function(res) {
				alert(res);
                /*if(res.exists){
                    alert('true');
                }else{
                    alert('false');
                }*/
            },
            error: function (jqXHR, exception) {

            }
        });
    });*/
    jQuery('#client_state').on('change', function() {
        if(this.value == 'Other'){
            jQuery('#other_state_div').attr('style','display: block');
        }else{
            //alert(this.value);
            jQuery('#other_state_div').attr('style','display: none');
        }
    });
});
</script>
@endsection