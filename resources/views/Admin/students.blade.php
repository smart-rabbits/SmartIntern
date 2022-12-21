@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Student Management</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Student Management</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">Student Management  <a href="/exportusr"><button type="button" style="float:right;"  class="btn btn-outline-success">Export</button></a>  <button type="button" style="float:right; margin-right:20px;"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary create">Create New</button>   </h5>

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
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary edit"
        data-id="{{ $student->id }}"
        data-name="{{ $student->FullName }}"
        data-ic="{{ $student->IC }}"
        data-matricno="{{ $student->matricNum }}"
        data-gender="{{ $student->gender }}"
        data-contact="{{ $student->contact }}"
        data-address="{{ $student->address }}"
        data-company_id="{{ $student->company_id }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}" 
        data-cgpa="{{ $student->CGPA }}" 
        data-facsv="{{ $student->faculty_sv_id }}"
        data-faculty="{{ $student->Faculty }}"
        data-course="{{ $student->Course }}"
        data-year="{{ $student->Year }}"
        >Edit</button>      
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" 
        data-id="{{ $student->id }}"
        data-name="{{ $student->FullName }}"
        data-ic="{{ $student->IC }}"
        data-matricno="{{ $student->matricNum }}"
        data-gender="{{ $student->gender }}"
        data-contact="{{ $student->contact }}"
        data-address="{{ $student->address }}"
        data-company_id="{{ $student->company_id }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}" 
        data-cgpa="{{ $student->CGPA }}" 
        data-facsv="{{ $student->faculty_sv_id }}"
        data-faculty="{{ $student->Faculty }}"
        data-course="{{ $student->Course }}"
        data-year="{{ $student->Year }}"
        class="btn btn-outline-warning view">View</button>        
      <a href="deleteStudent/{{ $user->id }}"><button type="button" onclick="return confirm('Are you sure you want delete this Student?');" class="btn btn-outline-danger">Delete</button></a>

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
                <hr>
    
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Faculty Supervisor</label>
                  <select id="faculty_sv_id" name="faculty_sv_id" class="form-select" required>
                    <option selected disabled>-- Select Faculty Supervisor --</option>
                    @foreach($fsupervisors as $sup)
                    <option value="{{ $sup->id }}"> {{ $sup->faculty }} | {{ $sup->FullName }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Company</label>
                  <select id="company_id" name="company_id" class="form-select" required>
                    <option selected disabled>-- Select Company --</option>
                    @foreach($csupervisors as $sup)
                    <option value="{{ $sup->uid }}">{{ $sup->company_name }} | {{ $sup->FullName }}</option>
                    @endforeach
                  </select>
                </div>

             

            </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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

      $(document).on("click",".create",function() {

$('#submit').show();
$('#ID').val('');
$('#TYPE').val('CREATE');
$('#FullName').val('').attr('disabled',false);
$('#IC').val('').attr('disabled',false);
$('#matricNum').val('').attr('disabled',false);
$('#gender').val('').attr('disabled',false);
$('#address').val('').attr('disabled',false);
$('#company_id').val('').attr('disabled',false);
$('#username').val('').attr('disabled',false);
$('#email').val('').attr('disabled',false);
$('#contact').val('').attr('disabled',false);
$('#CGPA').val('').attr('disabled',false);
$('#faculty_sv_id').val('').attr('disabled',false);
$('#Faculty').val('').attr('disabled',false);
$('#Course').val('').attr('disabled',false);
$('#Year').val('2022').attr('disabled',false);


});

      $(document).on("click",".edit",function() {

      var id = $(this).data('id');
      var name = $(this).data('name');
      var ic = $(this).data('ic');
      var matricno = $(this).data('matricno');
      var gender = $(this).data('gender');
      var contact = $(this).data('contact');
      var address = $(this).data('address');
      var company_id = $(this).data('company_id');
      var username = $(this).data('username');
      var email = $(this).data('email');
      var cgpa =  $(this).data('cgpa');
      var facsv = $(this).data('facsv');
      var faculty = $(this).data('faculty');
      var course = $(this).data('course');
      var year = $(this).data('year');

      $('#submit').show();
      $('#ID').val(id);
      $('#TYPE').val('EDIT');
      $('#FullName').val(name).attr('disabled',false);
      $('#IC').val(ic).attr('disabled',false);
      $('#matricNum').val(matricno).attr('disabled',false);
      $('#gender').val(gender).attr('disabled',false);
      $('#address').val(address).attr('disabled',false);
      $('#company_id').val(company_id).attr('disabled',false);
      $('#username').val(username).attr('disabled',false);
      $('#email').val(email).attr('disabled',false);
      $('#contact').val(contact).attr('disabled',false);
      $('#CGPA').val(cgpa).attr('disabled',false);
      $('#faculty_sv_id').val(facsv).attr('disabled',false);
      $('#Faculty').val(faculty).attr('disabled',false);
      $('#Course').val(course).attr('disabled',false);
      $('#Year').val(year).attr('disabled',false);
      
});

$(document).on("click",".view",function() {

var id = $(this).data('id');
var name = $(this).data('name');
var ic = $(this).data('ic');
var matricno = $(this).data('matricno');
var gender = $(this).data('gender');
var contact = $(this).data('contact');
var address = $(this).data('address');
var company_id = $(this).data('company_id');
var username = $(this).data('username');
var email = $(this).data('email');
var cgpa =  $(this).data('cgpa');
var facsv =  $(this).data('facsv');
var faculty = $(this).data('faculty');
      var course = $(this).data('course');
      var year = $(this).data('year');


$('#submit').hide();
$('#ID').val(id);
$('#TYPE').val('VIEW');
$('#FullName').val(name).attr('disabled',true);
$('#IC').val(ic).attr('disabled',true);
$('#matricNum').val(matricno).attr('disabled',true);
$('#gender').val(gender).attr('disabled',true);
$('#address').val(address).attr('disabled',true);
$('#company_id').val(company_id).attr('disabled',true);
$('#username').val(username).attr('disabled',true);
$('#email').val(email).attr('disabled',true);
$('#contact').val(contact).attr('disabled',true);
$('#CGPA').val(cgpa).attr('disabled',true);
$('#faculty_sv_id').val(facsv).attr('disabled',true);
$('#Faculty').val(faculty).attr('disabled',true);
      $('#Course').val(course).attr('disabled',true);
      $('#Year').val(year).attr('disabled',true);
});

    });
  </script>

@include('Navigation.footer')