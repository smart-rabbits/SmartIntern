<!DOCTYPE html>
<html>
<head>
    <title>List of Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-3 mb-3">
            <div class="card-header text-center">
                <h4><b>Student List</b></h4>
                @if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
		</div>
		@endif
            </div>

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }} </strong>
            </div>
            @endif
            <div class="card-body">
                   <form method="post" enctype="multipart/form-data" action="{{ url('/import') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload</label></td>
                                <td width="30">
                                    <input type="file" name="file" accept=".xlsx,.xls,.csv" required/>
                                    @error('file')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td width="30%" align="left">
                                    <input type="submit" name="upload" class="btn btn-primary" value="Upload Student Data">
                                </td>
                            </tr>
                        </table>
                        </div style="display: inline;" align="center">
                        <div style="float: left;">
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ url("/addStudent") }}'" >Add Student Data</button></a><br><br>
                        </div>
                        <div style="float: right;">
                            <a class="btn btn-danger float-end" href="{{ route('student.export') }}">Export Student Data</a>
                        </div>
                    </form>
                    
                
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>IC</th>
                    <th>Email</th>
                    <th>Matric Number</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Company Intern</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->Username }}</td>
                    <td>{{ $row->Password }}</td>
                    <td>{{ $row->Name }}</td>
                    <td>{{ $row->IC }}</td>
                    <td>{{ $row->Email }}</td>
                    <td>{{ $row->Matric Number }}</td>
                    <td>{{ $row->Gender }}</td>
                    <td>{{ $row->Contact }}</td>
                    <td>{{ $row->Address }}</td>
                    <td>{{ $row->Company Intern }}</td>
                    <td>{{ $row->Action }}</td>
                    <td><a href="{{ url('editStudent/'.$row->username) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('deleteCompany/'.$row->username) }}"  class="btn btn-danger">Delete</a></td>

                </tr>
                @endforeach
            </table>
</body>
</html>