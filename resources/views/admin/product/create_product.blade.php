@extends('layouts.admin')
@section('content')
    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
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
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store')}}" method="post" role='form'>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Product Name</label>
                                        <input type="text" class="form-control required" id="product_name" name="product_name" value="{{ old('product_name') }}">
										<span class="text-danger">
										@if ($errors->has('product_name'))
										  {{ $errors->first('product_name') }}
									    @endif
									 </span>
									</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Product Tax</label>
                                        <input type="text" class="form-control required" id="product_tax" name="product_tax" value="{{old('product_tax')}}">
										<span class="text-danger">
										@if($errors->has('product_tax'))
											{{$errors->first('product_tax')}}
										@endif
										</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Product Model Number</label>
                                        <input type="text" class="form-control required " id="product_model_num" name="product_model_num" value="{{old('product_model_num')}}">
										<span class="text-danger" id="emailmsg">
										@if($errors->has('product_model_num'))
											{{$errors->first('product_model_num')}}
										@endif
										</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Product Price</label>
                                        <input type="text" class="form-control required " id="product_rprice" name="product_price" value="{{old('product_price')}}">
										<span class="text-danger" id="emailmsg">
										@if($errors->has('product_price'))
											{{$errors->first('product_price')}}
										@endif
										</span>
                                    </div>
                                 </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit" id="submit"/>
                                <input type="reset" class="btn btn-default" value="Reset" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection