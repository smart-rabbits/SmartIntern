<head>
    <title>List of Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif
<div class="container">
<div class="card">
	<div class="card-header text-center">
		<h4><b>Add Company Data</b></h4>
		@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
		</div>
		@endif
	</div>
	<div class="card-body">
		<form action = "{{ url('saveCompany') }}" method = "post" class="form-group" style="width:70%; margin-left:15%;">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Company</label>
				<div class="col-sm-10">
					<input type="text" name="CompanyName" class="form-control" placeholder="Enter Company Name" value="{{ old('CompanyName') }}">
					@error('companyName')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
					@error('email')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Address</label>
				<div class="col-sm-10">
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address') }}">
					@error('address')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Supervisor</label>
				<div class="col-sm-10">
                    <input type="text" name="supervisor" class="form-control" placeholder="Enter Supervisor Name" value="{{ old('supervisor') }}">
					@error('supervisor')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="text-center">
				<br><br>
				<button type="submit" class="btn btn-primary">Add</button>
				<a href="{{ url('company') }}" class="btn btn-danger">Back</a>
			</div>	
		</form>
	</div>
</div>
</div>
</body>