
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

	<h1>Add new customer</h1>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	
	@if(Session::has('duplicateError'))
		<div class="alert alert-danger">{{Session::get('duplicateError')}}</div>
	@endif

					 <form method="POST" action="{{route('addNewCustomer',['id' => $StoreId->StoreId])}}" >
					 {{ csrf_field() }}
					  <div class="form-group">
						<input type="hidden" class="form-control" id="Id" name="Id" value="{{old('StoreId')}}">
					  </div>
					  <div class="form-group">
						<label for="Firstname">Firstname:</label>
						<input type="text" class="form-control" id="Firstname" name="Firstname" value="{{old('Firstname')}}">
					  </div>
					  <div class="form-group">
						<label for="Phone">Lastname:</label>
						<input type="text" class="form-control" id="Lastname" name="Lastname" value="{{old('Lastname')}}">
					  </div>
					  <div class="form-group">
						<label for="Phone">Phone:</label>
						<input type="text" class="form-control" id="Phone" name="Phone" value="{{old('Phone')}}">
					  </div>
					  <div class="form-group">
						<label for="Domain">Email:</label>
						<input type="text" class="form-control" id="Email" name="Email" value="{{old('Email')}}">
					  </div>

					  <button type="submit" class="btn btn-default">Create new user</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection