
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <h1>Search Store</h1>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					
					@if(Session::has('searchError'))
						<div class="alert alert-danger">{{Session::get('searchError')}}</div>
					@endif

					<form method="get" action="{{route('storeFinder')}}" >
					 {{ csrf_field() }}

					  <div class="form-group">
						<label for="storeName">Store Name:</label>
						<input type="text" class="form-control" id="storeName" name="storeName">
					  </div>

					  <button type="submit" class="btn btn-default">Search Store</button>
					</form><br><br>
					<!-- if the search has got any result display it -->
					@if(!Session::has('searchError'))
					@isset($searchResult)
					<table class="table table-striped table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>Store Id</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						@foreach($searchResult as $key => $value)
							<tr>
								<td>{{ $value->StoreId }}</td>
								<td>{{ $value->Name }}</td>

								<!-- we will also add show, edit, and delete buttons -->
								<td>
									<!-- show the store (uses the show method found at GET /stores/{id} -->
									<a class="btn btn-md btn-success" href="{{ URL::to('stores/' . $value->StoreId) }}">Show this Store</a>

									<!-- edit this store (uses the edit method found at GET /stores/{id}/edit -->
									<a class="btn btn-md btn-info" href="{{ URL::to('stores/' . $value->StoreId . '/edit') }}">Edit this Store</a>

								</td>
							</tr>
						@endforeach
						
						</tbody>
					</table>
					@endisset
					@endif
					<!-- end if the search has got any result display it -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection