
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

                    <h1>Edit a Store</h1>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	
	@if(Session::has('success'))
		<div class="alert alert-success">{{Session::get('success')}}</div>
	@endif

					 <form method="POST" action="{{route('updateStore',['id' => $editFormRecord->StoreId])}}" >
					 {{ csrf_field() }}
					  <div class="form-group">
						<input type="hidden" class="form-control" id="Id" name="Id" value="{{ $editFormRecord->StoreId }}">
					  </div>
					  <div class="form-group">
						<label for="storeid">Store ID:</label>
						<input type="text" class="form-control" id="StoreId" name="StoreId" value="{{ $editFormRecord->StoreId }}">
					  </div>
					  <div class="form-group">
						<label for="Phone">Phone:</label>
						<input type="text" class="form-control" id="Phone" name="Phone" value="{{ $editFormRecord->Phone }}">
					  </div>
					  <div class="form-group">
						<label for="Name">Name:</label>
						<input type="text" class="form-control" id="Name" name="Name" value="{{ $editFormRecord->Name }}">
					  </div>
					  <div class="form-group">
						<label for="Domain">Domain:</label>
						<input type="text" class="form-control" id="Domain" name="Domain" value="{{ $editFormRecord->Domain }}">
					  </div>
					  <div class="form-group">
						<label for="Status">Status:</label>
						<input type="text" class="form-control" id="Status" name="Status" value="{{ $editFormRecord->Status }}"> 
					  </div>
					  <div class="form-group">
						<label for="Street">Street:</label>
						<input type="text" class="form-control" id="Street" name="Street" value="{{ $editFormRecord->Street }}">
					  </div>
					  <div class="form-group">
						<label for="State">State:</label>
						<input type="text" class="form-control" id="State" name="State" value="{{ $editFormRecord->State }}">
					  </div>

					  <button type="submit" class="btn btn-default">Submit</button>
					</form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection