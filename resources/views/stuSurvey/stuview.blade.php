@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Survey</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Student Survey</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">Survey</h5>

  <br>

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-striped" id="mytable">
                <tr>
                    <th>Student Name</th>
                    <th>Matric Number</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Year/Course</th>
                    <th>Company</th>
                    <th>Company Address</th>
                    <th>Lesson learnt</th>
                    <th>Prefer</th>
                    <th>Reason</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->matricnumber }}</td>
                    <td>{{ $row->contact }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->yearcourse }}</td>
                    <td>{{ $row->company }}</td>
                    <td>{{ $row->compaddress }}</td>
                    <td>{{ $row->learn }}</td>
                    <td>{{ $row->prefer }}</td>
                    <td>{{ $row->preferwhy }}</td>
                </tr>
                @endforeach
            </table>
</body>
</html>
@include('Navigation.footer')

