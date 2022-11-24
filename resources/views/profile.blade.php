@extends('userprofile')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
<div class="row mt-4">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>

	@endif
	<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header"> <h1><br><b>Edit Profile<b><br></h1><br></div>
			<div class="card-body">
				<form method="post" action="{{ route('profile.edit_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>User Name</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="name" value="{{ $data->name }}" />
		        		@if($errors->has('name'))
		        		<span class="text-danger">{{ $errors->first('name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>User Email</b></label>
		        		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}" />
		        		@if($errors->has('email'))
		        		<span class="text-danger">{{ $errors->has('email') }}</span>
		        		@endif
		        	</div>
			
		        	<div class="form-group mb-3"><br><br>
		        		<input type="submit" class="btn btn-primary" value="Edit" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</div>

@endsection