<head>
    <title>List of Student</title>
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
		<h4><b>Edit Student Data</b></h4>
		@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
		</div>
		@endif
	</div>
	<div class="card-body">
		<form action = "{{ url('updateStudent') }}" method = "post" class="form-group" style="width:70%; margin-left:15%;">
			@csrf
            <input type="hidden" name="username" value="{{ $data->username }}">
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Username</label>
				<div class="col-sm-10">
					<input type="text" name="username" class="form-control" placeholder="Enter Username" value="{{ $data->username }}">
					@error('username')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" placeholder="Enter password" value="{{ $data->password }}">
					@error('password')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $data->name }}">
					@error('name')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">IC</label>
				<div class="col-sm-10">
					<input type="text" name="IC" class="form-control" placeholder="Enter IC" value="{{ $data->IC }}">
					@error('IC')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $data->email }}">
					@error('email')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Matric Number</label>
				<div class="col-sm-10">
					<input type="text" name="matricnum" class="form-control" placeholder="Enter Matric Number" value="{{ $data->matricnum }}">
					@error('matricnum')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Gender</label>
				<div class="col-sm-10">
					<select class="form-control" name="gender">
						<option selected>Select your gender</option>
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
					@error('gender')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Contact</label>
				<div class="col-sm-10">
					<input type="text" name="contact" class="form-control" placeholder="Enter Contact" value="{{ $data->contact }}">
					@error('contact')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Address</label>
				<div class="col-sm-10">
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $data->address }}">
					@error('address')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company Intern</label>
				<div class="col-sm-10">
                    <input type="text" name="companyIntern" class="form-control" placeholder="Enter Company Intern" value="{{ $data->companyIntern }}">
					@error('companyIntern')
					<div class="alert alert-danger" role="alert">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="text-center">
				<br><br>
				<button type="submit" class="btn btn-primary">Edit</button>
				<a href="{{ url('student') }}" class="btn btn-danger">Back</a>
			</div>	
		</form>
	</div>
</div>
</div>
</body>