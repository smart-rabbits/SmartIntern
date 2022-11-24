<!DOCTYPE html>
<html>
<head>
    <title>List of Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
     

    <div class="container">
        <div class="card mt-3 mb-3">
            <div class="card-header text-center">
                <h4><b>Company List</b></h4>
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
        <input type="submit" name="upload" class="btn btn-primary" value="Upload Company Data">
       </td>
      </tr>
     </table>
    </div style="display: inline;" align="center">
    <div style="float: left;">
            <button type="button" class="btn btn-primary" onclick="window.location='{{ url("/addCompany") }}'" >Add Company Data</button></a><br><br>
        </div>
        <div style="float: right;">
    <a class="btn btn-danger float-end" href="{{ route('company.export') }}">Export Company Data</a>
</div>
   </form>
                    
                
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Supervisor</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->CompanyName }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->address }}</td>
                    <td>{{ $row->supervisor }}</td>
                    <td><a href="{{ url('editCompany/'.$row->CompanyName) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('deleteCompany/'.$row->CompanyName) }}"  class="btn btn-danger">Delete</a></td>

                </tr>
                @endforeach
            </table>
</body>
</html>