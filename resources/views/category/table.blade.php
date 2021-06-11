<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">

@if(session('message'))

<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('message')}}</strong>
</div>
@endif

<div class="container">
<h2>Product Table</h2>
    
  <a  class="btn btn-primary" href={{route('product.form')}} >{{__('Add Record')}}</a><br/><br/>
    <br/>
    <div class=" float-right ">
                        <a href="{{ route('product.form') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>

<form method="post" id="basicform" action="{{ route('product.form.delete') }}">
				@csrf
<div class="col-lg-6">
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control" name="status">
										<option>{{ __('Select Action') }}</option>
										
										<option value="delete">{{ __('Delete Permanently') }}</option>

									</select>
								</div>
							</div>
							<div class="single-filter">
								<button type="submit" class="btn btn-primary ml-2 mt-1">{{ __('Apply') }}</button>
							</div>
						</div>
					</div>
          </div>
</form>

<div class="container">

<div class="float-right pb-3">
                        <form>
                            <div class="input-group mt-3 col-12">
                                <input type="text" class="form-control" placeholder="Search By  ID" required=""
                                    name="search" value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Search</button>
                                </div>
                            </div>

                            
                   
                        </form>
                    </div>

                    </div>


  
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
    <th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="checkAll">
									<label class="custom-control-label" for="checkAll"></label>
								</div>
							</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
   
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @if(count($data) > 0)

  @foreach($data as $d)

    <tr>
    <th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $d->id }}" value="{{ $d->id }}">
									<label class="custom-control-label" for="customCheck{{ $d->id }}"></label>
								</div>
							</th>
      <th scope="row">{{$d->id}}</th>
      <td>{{$d->name}}</td>

      <td><a href={{route('category.form.edit',$d->id)}}>Edit</a>
        <a href={{route('category.form.delete',$d->id)}} onclick="alert('Successfully Deleted!')">Delete</a></td>  
      </tr>

@endforeach
@else
    <h1>No Data Found</h1>

@endif
  </tbody>
</table>

</div>
<div class="container">
{{$data->links()}}

</body>
</html>
