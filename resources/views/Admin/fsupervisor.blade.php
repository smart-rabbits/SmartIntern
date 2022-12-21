@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Faculty Supervisor Management</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Faculty Supervisor Management</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">Faculty Supervisor Management   <button type="button" style="float:right;"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary create">Create New</button>   </h5>

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
      <th scope="col">Faculty</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($fsupervisors as $key => $fsupervisor)
    <?php 
      $user = DB::table('users')->where('id',$fsupervisor->user_id)->first(); ?>
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>{{ $user->username }}</td>
      <td>{{ $fsupervisor->staffID }}</td>
      <td>{{ $fsupervisor->faculty }}</td>
     
      <td>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary edit"
        data-id="{{ $fsupervisor->id }}"
        data-name="{{ $fsupervisor->FullName }}"
        data-ic="{{ $fsupervisor->IC }}"
        data-staffid="{{ $fsupervisor->staffID }}"
        data-gender="{{ $fsupervisor->gender }}"
        data-contact="{{ $fsupervisor->contact }}"
        data-address="{{ $fsupervisor->address }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}" 
        data-faculty="{{ $fsupervisor->faculty }}"
        >Edit</button>      
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" 
        data-id="{{ $fsupervisor->id }}"
        data-name="{{ $fsupervisor->FullName }}"
        data-ic="{{ $fsupervisor->IC }}"
        data-staffid="{{ $fsupervisor->staffID }}"
        data-gender="{{ $fsupervisor->gender }}"
        data-contact="{{ $fsupervisor->contact }}"
        data-address="{{ $fsupervisor->address }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}" 
        data-faculty="{{ $fsupervisor->faculty }}"
        
        class="btn btn-outline-warning view">View</button>        
      <a href="deleteFsupervisor/{{ $user->id }}"><button type="button" onclick="return confirm('Are you sure you want delete this Faculty Supervisor?');" class="btn btn-outline-danger">Delete</button></a>

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
                      <h5 class="modal-title">Faculty Supervisor</h5>
                      <button type="button" class="btn-close create" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
            <div class="card-body">
              <!-- Multi Columns Form -->

              <form class="row g-3" action="storefsupervisor" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
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
                  <label for="inputEmail5" class="form-label">Staff ID</label>
                  <input type="text" class="form-control" id="staffID" name="staffID" required>
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
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Contact No</label>
                  <input type="number" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="col-md-8">
                  <label for="inputEmail5" class="form-label">Faculty</label>
                  <input type="text" class="form-control" id="faculty" name="faculty" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                </div>
                <hr>

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
$('#username').val('').attr('disabled',false);
$('#email').val('').attr('disabled',false);
$('#contact').val('').attr('disabled',false);
$('#faculty').val('').attr('disabled',false);
$('#staffID').val('').attr('disabled',false);



});

      $(document).on("click",".edit",function() {

      var id = $(this).data('id');
      var ic = $(this).data('ic');
      var gender = $(this).data('gender');
      var contact = $(this).data('contact');
      var address = $(this).data('address');
      var username = $(this).data('username');
      var email = $(this).data('email');
      var staffid =  $(this).data('staffid');
      var faculty = $(this).data('faculty');
      var name = $(this).data('name');

      $('#submit').show();
      $('#ID').val(id);
      $('#TYPE').val('EDIT');
      $('#FullName').val(name).attr('disabled',false);
      $('#IC').val(ic).attr('disabled',false);
      $('#staffID').val(staffid).attr('disabled',false);
      $('#gender').val(gender).attr('disabled',false);
      $('#address').val(address).attr('disabled',false);
      $('#username').val(username).attr('disabled',false);
      $('#email').val(email).attr('disabled',false);
      $('#contact').val(contact).attr('disabled',false);
      $('#faculty').val(faculty).attr('disabled',false);
      
});

$(document).on("click",".view",function() {

var id = $(this).data('id');
var name = $(this).data('name');
var ic = $(this).data('ic');
var gender = $(this).data('gender');
var contact = $(this).data('contact');
var address = $(this).data('address');
var username = $(this).data('username');
var email = $(this).data('email');
var staffid =  $(this).data('staffid');
var faculty = $(this).data('faculty');

$('#submit').hide();
$('#ID').val(id);
$('#TYPE').val('VIEW');
$('#FullName').val(name).attr('disabled',true);
$('#IC').val(ic).attr('disabled',true);
$('#staffID').val(staffid).attr('disabled',true);
$('#gender').val(gender).attr('disabled',true);
$('#address').val(address).attr('disabled',true);
$('#username').val(username).attr('disabled',true);
$('#email').val(email).attr('disabled',true);
$('#contact').val(contact).attr('disabled',true);
$('#faculty').val(faculty).attr('disabled',true);
});

    });
  </script>

@include('Navigation.footer')