
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

                    <h1>View all customers in this store</h1>
                    
				<!-- will be used to show any messages -->
				@if (Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($customerRecords as $key => $value)
						<tr>
							<td>{{ $value->Firstname }}</td>
							<td>{{ $value->Lastname }}</td>
							<td>{{ $value->Email}}</td>

							<!-- we will also add show, edit, and delete buttons -->
							<td>

								<!-- show the store (uses the show method found at GET /stores/{id} -->
								<a class="btn btn-small btn-success" href="{{ URL::to('stores/' . $value->Id) }}">Show this Store</a>

								<!-- edit this store (uses the edit method found at GET /stores/{id}/edit -->
								<a class="btn btn-small btn-info" href="{{ URL::to('stores/' . $value->StoreId . '/edit') }}">Edit this Store</a>

							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<!-- display pagination result -->
					{{$customerRecords->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection