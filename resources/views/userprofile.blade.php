@extends('student-dashboard')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title> My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>

	@endif

    @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
        @endif

    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
  <div class="login_form">
 <h1><br><b>Profile<b><br></h1><br>
     
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 

          </div>
          
          <table class="table">
          <tr>
              <th>Username </th>
              <td><a class="px-3" href="#"> {{ Auth::user()->name }}</a></td>
          </tr>
          <tr>
              <th>Email </th>
              <td><a class="px-4" href="#"> {{ Auth::user()->email }}</a></td>
          </tr>
          </table>
           <div class="row">
            <div class="col-sm-2">
            </div>
             <div class="col-sm-4">
         <button type="button" onclick="window.location='{{ url("/profile") }}'" >Edit Profile</button></a><br><br>
            </div>
            <div class="col-sm-4">
                <button type="button" onclick="window.location='{{ url("/change-password") }}'" >Change Password</button></a><br><br>
                   </div>
           </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
@endsection