@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
				    @if (session('notExists'))
						<div class="alert alert-danger">
							{{ session('notExists') }}
						</div>
					@endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="jumbotron">
					  <h1 class="display-4">Home page!</h1>
					  <p class="lead">The main functionality is based on the requirements. Hopefully the main objectives of the project have been satisfied.</p>
					  <hr class="my-4">
					  <p>.</p>
					  <p class="lead">
						<a class="btn btn-primary btn-lg" href="{{ URL::to('storeSearchForm') }}" role="button">Lets search stores</a>
					  </p>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
