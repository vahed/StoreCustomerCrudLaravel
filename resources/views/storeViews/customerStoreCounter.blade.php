
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

                    <h1>Customers in each store</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Store Id</th>
								<th>Number of customers</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($customerStoreCounter as $key => $value)
							<tr>
								<td>{{ $value->StoreId }}</td>
								<td>{{ $value->Counter }}</td>

								<!-- we will also add show, edit, and delete buttons -->
								<td>
									<!-- show the store (uses the show method found at GET /stores/{id} -->
									<a class="btn btn-small btn-success" href="{{ URL::to('stores/' . $value->StoreId) }}">Show this Store</a>

									<!-- edit this store (uses the edit method found at GET /stores/{id}/edit -->
									<a class="btn btn-small btn-info" href="{{ URL::to('stores/' . $value->StoreId . '/edit') }}">Edit this Store</a>

								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<!-- display pagination result -->
					{{--$stores->links()--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection