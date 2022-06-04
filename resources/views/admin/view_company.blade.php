@extends('layouts.admin')

@section('content')
 <!-- /.content-header -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">View Company</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">View Company</li>
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
                <h3 class="card-title">View Company Details</h3>
              </div>
                    <!-- form start -->
                   
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
	                                <div class="form-group">
					                  <label for="password">Comapany Name:</label>

					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="fas fa-home"></i></span>
					                    </div>
					                     <input type="text" disabled class="form-control required"  id="company_name" name="company_name" maxlength="128" value="{{ $company->name }}">
                                     </div>
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
					                    <input type="text" disabled class="form-control required" id="company_email"  name="company_email" maxlength="128" value="{{ $company->email }}">
                                     </div>
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
					                    <input type="text" disabled class="form-control required" id="company_address" name="company_address" value="{{ $company->address }}">
					                  </div>
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
					                    <input type="text" disabled class="form-control" name="company_contact" id="company_contact" value="{{ $company->mobile }}">
					                  </div>
					              	</div>
				                  <!-- /.input group -->
				                </div>
                            </div>
                            <div class="row">
							    
								<div class="col-md-2">
                                    <!--<div class="form-group">
                                        <label for="mobile">Company Logo</label>
                                        <input type="file" class="form-control required " id="company_logo"  name="company_logo" onchange="readURL(this);">
                                    </div>-->
                                    <div class="form-group">
					                    <label for="exampleInputFile">Company Logo</label>
					                    <div class="input-group">
					                      <div class="custom-file">
					                        
					                      </div>
					                     </div>
					                  </div>
	                                </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                     <img id="blah" src="{{ asset('uploads/companyimg/'.$company->companylogo) }}" width="120" height="100">   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Company Gst Number</label>
                                        <input type="text" disabled class="form-control required " id="company_gst"  name="company_gst" value="{{ $company->gstnumber }}">
                                    </div>
                                </div>
								   
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank Name</label>
                                        <input type="text" disabled class="form-control required" id="bank_name" name="bank_name" value="{{ $company->bankname }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Name</label>
                                        <input type="text" disabled class="form-control required" id="account_name" name="account_name" value="{{ $company->accountname }}">
                                    </div>
                                </div>
                            </div>
							<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Account Number</label>
                                        <input type="text" disabled class="form-control required digits" id="account_number" name="account_number" value="{{ $company->accountnumber }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Bank IFSC Code</label>
                                        <input type="text" disabled class="form-control required" id="ifsc_code" name="ifsc_code" value="{{ $company->bankifsccode }}">
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="card-footer">
                            
                        </div>
                   
                </div>
        <!-- /.card -->
       </div>
    </div>
</section>

@endsection