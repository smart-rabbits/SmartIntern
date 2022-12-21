@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Survey</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Supervisor Survey</li>
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
                    <th>Supervisor Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Student Name</th>
                    <th>Rate</th>
                    <th>Reason</th>
                    <th>Comment</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->svName }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->svCompany }}</td>
                    <td>{{ $row->svStu }}</td>
                    <td>{{ $row->rate }}</td>
                    <td>{{ $row->reason }}</td>
                    <td>{{ $row->comment }}</td>
                </tr>
                @endforeach
            </table>
</body>
</html>
@include('Navigation.footer')

