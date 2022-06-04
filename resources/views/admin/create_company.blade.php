@extends('layouts.admin')
@section('content')
 <!-- /.content-header -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Company</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Company</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <!-- /.content-header -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
                    <div class="card-header">
                <h3 class="card-title">Enter Company Details</h3>
              </div>
                    <!-- form start -->
                    <form role="form" id="addCompany" action="{{ route('company.store')}}" method="post" role="form" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
	                                <div class="form-group">
					                  <label for="password">Comapany Name:</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="fas fa-home"></i></span>
					                    </div>
					                     <input type="text" class="form-control required"  id="company_name" name="company_name" maxlength="128" value="{{old('company_name')}}">
                                     </div>
									 <span class="text-danger">
										@if ($errors->has('company_name'))
										  {{ $errors->first('company_name') }}
									    @endif
									 </span>
					              	</div>
				                  <!-- /.input group -->
				                </div>
				                  <div class="col-md-6">
	                                <div class="form-group">
					                  <label for="password">Comapany Email:</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
					                    </div>
					                    <input type="email" class="form-control required" id="company_email"  name="company_email" maxlength="128" value="{{old('company_email')}}">
                                     </div>
									 <span class="text-danger">
										@if ($errors->has('company_email'))
										  {{ $errors->first('company_email') }}
									    @endif
									 </span>
					              	</div>
				                  <!-- /.input group -->
				                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
	                                <div class="form-group">
					                  <label for="password">Comapany Address:</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="fas fa-map"></i></span>
					                    </div>
					                    <input type="text" class="form-control required" id="company_address" name="company_address" value="{{old('company_address')}}">
					                  </div>
									  <span class="text-danger">
										@if ($errors->has('company_address'))
										  {{ $errors->first('company_address') }}
									    @endif
									 </span>
					              	</div>
				                  <!-- /.input group -->
				                </div>
                                <div class="col-md-6">
	                                <div class="form-group">
					                  <label>Contact Number:</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
					                    </div>
					                    <input type="text" class="form-control" name="company_contact" id="company_contact" value="{{old('company_contact')}}">
					                  </div>
									  <span class="text-danger">
										@if ($errors->has('company_contact'))
										  {{ $errors->first('company_contact') }}
									    @endif
									 </span>
					              	</div>
				                  <!-- /.input group -->
				                </div>
                            </div>
                            <div class="row">
							<div class="col-md-2">
                                    <div class="form-group">
                                     <img id="blah" width="120" height="100">   
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <!--<div class="form-group">
                                        <label for="mobile">Company Logo</label>
                                        <input type="file" class="form-control required " id="company_logo"  name="company_logo" onchange="readURL(this);">
                                    </div>-->
                                    <div class="form-group">
					                    <label for="exampleInputFile">Company Logo</label>
					                    <div class="input-group">
					                      <div class="custom-file">
					                        <input type="file" class="custom-file-input" id="company_logo" name="company_logo">
					                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
					                      </div>
					                     </div>
										 <span class="text-danger">
										@if ($errors->has('company_logo'))
										  {{ $errors->first('company_logo') }}
									    @endif
									 </span>
					                  </div>
	                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Company Gst Number</label>
                                        <input type="text" class="form-control required " id="company_gst"  name="company_gst" value="{{old('company_gst')}}">
										<span class="text-danger">
										@if ($errors->has('company_gst'))
										  {{ $errors->first('company_gst') }}
									    @endif
									 </span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank Name</label>
                                        <input type="text" class="form-control required" id="bank_name" name="bank_name"  value="{{old('bank_name')}}">
										<span class="text-danger">
										@if ($errors->has('bank_name'))
										  {{ $errors->first('bank_name') }}
									    @endif
									 </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Name</label>
                                        <input type="text" class="form-control required" id="account_name" name="account_name"  value="{{old('account_name')}}">
										<span class="text-danger">
										@if ($errors->has('account_name'))
										  {{ $errors->first('account_name') }}
									    @endif
									 </span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Number</label>
                                        <input type="text" class="form-control required digits" id="account_number" name="account_number"  value="{{old('account_number')}}">
										<span class="text-danger">
										@if ($errors->has('account_number'))
										  {{ $errors->first('account_number') }}
									    @endif
									 </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank IFSC Code</label>
                                        <input type="text" class="form-control required" id="ifsc_code" name="ifsc_code"  value="{{old('ifsc_code')}}">
										<span class="text-danger">
										@if ($errors->has('ifsc_code'))
										  {{ $errors->first('ifsc_code') }}
									    @endif
									 </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
        <!-- /.card -->
       </div>
    </div>
</section>
@endsection