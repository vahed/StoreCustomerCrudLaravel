
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

                    <h1>Displaying store: {{ $storeById->Name }}</h1>

					<!-- will be used to show any messages -->
					@if (Session::has('message'))
						<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Store Id</th>
								<th>Phone</th>
								<th>Name</th>
								<th>Domain</th>
								<th>Status</th>
								<th>Street</th>
								<th>State</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td>{{ $storeById->StoreId }}</td>
								<td>{{ $storeById->Phone }}</td>
								<td>{{ $storeById->Name }}</td>
								<td>{{ $storeById->Domain }}</td>
								<td>{{ $storeById->Status }}</td>
								<td>{{ $storeById->Street }}</td>
								<td>{{ $storeById->State }}</td>

								<!-- we will also add show, edit, and delete buttons -->
								<td>

									<!-- show the Stores (uses the show method found at GET /stores/{id} -->
									<a class="btn btn-small btn-success" href="{{ URL::to('stores/' . $storeById->StoreId . '/newCustomerForm') }}">Add customer to store</a>
									
									<!-- edit this Stores (uses the edit method found at GET /stores/{id}/edit -->
									<a class="btn btn-small btn-info" href="{{ URL::to('stores/' . $storeById->StoreId . '/edit') }}">Edit this Store</a>
									
									<a class="btn btn-small btn-primary" href="{{ URL::to('customers/' . $storeById->StoreId) }}">Find store Customers</a>
									
                                    <div class="form-group">
										<input type="hidden" name="course_id" value="{{ $storeById->StoreId }}">
									</div>
								</td>
							</tr>

						</tbody>
					</table>
                    <!-- display pagination result -->
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection