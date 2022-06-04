@extends('layouts.admin')

@section('content')
 <!-- /.content-header -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Companies</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <!-- /.content-header -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Company List</h3>
            <a href="{{ route('company.create')}}" class="btn btn-primary" style="float:right">Add New Company</a>
          </div>
        <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($company as $cp)
            <tr>
              <td>{{ $cp->id }}</td>
              <td>{{ $cp->name }}</td>
              <td>{{ $cp->email }}</td>
              <td>{{ $cp->mobile }}</td>
              <td><a href="{{ route('company.show', $cp->id)}}" class="btn btn-success"><i class="nav-icon far fa-eye"></i></a> | <a href="{{ route('company.edit', $cp->id)}}" class="btn btn-info"><i class="nav-icon far fa-edit"></i></a> | <!--<a href="javascript:void(0)" class="btn btn-danger" onclick="$(this).parent().find('form').submit()"><i class="nav-icon fa fa-trash"></i></a>
                <form action="{{ route('company.destroy', $cp->id)}}" method="post">
                  @method('DELETE')
                  {{ csrf_field() }}
                </form>-->
				<a data-toggle="modal" id="smallButton" data-target="#smallModal" class="btn btn-danger" data-attr="{{ route('delete', $cp->id) }}" title="Delete Project">
                    <i class="nav-icon fa fa-trash"></i>
                </a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Action</th>
            </tr>
            </tfoot>
            </table>
          </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
       </div>
    </div>
	<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
		//alert(href);
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
</script>
	
</section>

@endsection