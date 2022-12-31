@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>My Students</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">My Students</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">My Students</h5>

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

<!-- Table with stripped rows -->
<table class="table table-striped" id="mytable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Matric No</th>
      <th scope="col">CGPA</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($students as $key => $student)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>{{ $student->FullName }}</td>
      <td>{{ $student->matricNum }}</td>
      <td>{{ $student->CGPA }}</td>
      <td>{{ $student->status }}</td>
      <?php 
      $user = DB::table('users')->where('id',$student->user_id)->first(); ?>
      <td>
        <a href="vLogs/{{ $student->user_id }}"><button type="button" class="btn btn-outline-info">Logbooks</button></a>

        <button type="button" 
        data-bs-toggle="modal" 
        data-bs-target="#ExtralargeModal" 
        data-name="{{ $student->FullName }}"
        data-ic="{{ $student->IC }}"
        data-matricno="{{ $student->matricNum }}"
        data-gender="{{ $student->gender }}"
        data-contact="{{ $student->contact }}"
        data-address="{{ $student->address }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}" 
        data-cgpa="{{ $student->CGPA }}"
        data-faculty="{{ $student->Faculty }}"
        data-course="{{ $student->Course }}"
        data-year="{{ $student->Year }}"
        class="btn btn-outline-warning view">View</button>        
     

    </td>
    </tr>
    @empty
  

    @endforelse
  </tbody>
</table>
<!-- End Table with stripped rows -->

</div>
</div>


              <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Student</h5>
                      <button type="button" class="btn-close create" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
            <div class="card-body">
              <!-- Multi Columns Form -->

              <form class="row g-3" action="storestudent" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="TYPE" id="TYPE" value="CREATE">
    <input type="hidden" name="ID" id="ID">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="FullName" name="FullName" required>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Matric No</label>
                  <input type="text" class="form-control" id="matricNum" name="matricNum" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">IC Number</label>
                  <input type="number" class="form-control" id="IC" name="IC" required>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Gender</label>
                 <select id="gender" name="gender" class="form-select" required>
                  <option value="" selected disabled>-- Select Gender --</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                 </select>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Contact No</label>
                  <input type="number" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">CGPA</label>
                  <input type="number" class="form-control" id="CGPA" name="CGPA" step=".01" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Faculty</label>
                  <input type="text" class="form-control" id="Faculty" name="Faculty" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Course</label>
                  <input type="text" class="form-control" id="Course" name="Course" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Year</label>
                  <input type="number" min="1900" max="2099" step="1" value="2022" class="form-control" id="Year" name="Year"  required>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                </div>
      

             

            </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form><!-- End Multi Columns Form -->
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->



    </section>

  </main><!-- End #main -->

  <script>
    $(document).ready(function() {

      $('#mytable').DataTable();


$(document).on("click",".view",function() {

var name = $(this).data('name');
var ic = $(this).data('ic');
var matricno = $(this).data('matricno');
var gender = $(this).data('gender');
var contact = $(this).data('contact');
var address = $(this).data('address');
var username = $(this).data('username');
var email = $(this).data('email');
var cgpa =  $(this).data('cgpa');
var faculty = $(this).data('faculty');
      var course = $(this).data('course');
      var year = $(this).data('year');


$('#FullName').val(name).attr('disabled',true);
$('#IC').val(ic).attr('disabled',true);
$('#matricNum').val(matricno).attr('disabled',true);
$('#gender').val(gender).attr('disabled',true);
$('#address').val(address).attr('disabled',true);
$('#username').val(username).attr('disabled',true);
$('#email').val(email).attr('disabled',true);
$('#contact').val(contact).attr('disabled',true);
$('#CGPA').val(cgpa).attr('disabled',true);
$('#Faculty').val(faculty).attr('disabled',true);
      $('#Course').val(course).attr('disabled',true);
      $('#Year').val(year).attr('disabled',true);
});

    });
  </script>

@include('Navigation.footer')