@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Company Management</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Company Management</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">Company Management   <button type="button" style="float:right;"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary create">Create New</button>   </h5>

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
      <th scope="col">Company</th>
      <th scope="col">Supervisor</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($companies as $key => $company)
    <?php 
    
      
      $sup = DB::table('com_sv')->where('company_id',$company->id)->first(); 

      $user = DB::table('users')->where('id',$sup->user_id)->first(); 
      ?>
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>{{ $company->company_name }}</td>
      <td>{{ $sup->FullName }}</td>
      <td>{{ $sup->email }}</td>
      <td>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary edit"
        data-id="{{ $sup->id }}"
        data-cname="{{ $company->company_name }}"
        data-cemail="{{ $company->company_email }}"
        data-caddress="{{ $company->company_address }}"
        data-department="{{ $company->company_department }}"

        data-fullname="{{ $sup->FullName }}"
        data-ic="{{ $sup->IC }}"
        data-gender="{{ $sup->gender }}"
        data-contact="{{ $sup->contact }}"
        data-email="{{ $sup->email }}" 

        data-username="{{ $user->username }}"

        >Edit</button>      
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" 
        data-id="{{ $sup->id }}"
        data-cname="{{ $company->company_name }}"
        data-cemail="{{ $company->company_email }}"
        data-caddress="{{ $company->company_address }}"
        data-department="{{ $company->company_department }}"

        data-fullname="{{ $sup->FullName }}"
        data-ic="{{ $sup->IC }}"
        data-gender="{{ $sup->gender }}"
        data-contact="{{ $sup->contact }}"
        data-email="{{ $sup->email }}" 

        data-username="{{ $user->username }}"
        
        class="btn btn-outline-warning view">View</button>        
      <a href="deleteCsupervisor/{{ $sup->id }}"><button type="button" onclick="return confirm('Are you sure you want delete this Company?');" class="btn btn-outline-danger">Delete</button></a>

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
                      <h5 class="modal-title">Company</h5>
                      <button type="button" class="btn-close create" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
            <div class="card-body">
              <!-- Multi Columns Form -->

              <form class="row g-3" action="storecompany" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="TYPE" id="TYPE" value="CREATE">
    <input type="hidden" name="ID" id="ID">

    <h2>Company Details</h2>
    <hr>
    <div class="col-md-6">
                  <label for="inputName5" class="form-label">Company Name</label>
                  <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>
                <div class="col-md-6">
       
                  <label for="inputName5" class="form-label">Company Email</label>
                  <input type="email" class="form-control" id="company_email" name="company_email" required>
                </div>
                <div class="col-md-6">
       
       <label for="inputName5" class="form-label">Company Department</label>
       <input type="text" class="form-control" id="company_department" name="company_department" required>
     </div>

                
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Address</label>
                  <textarea class="form-control" id="company_address" name="company_address" rows="5" required></textarea>
                </div>

                <br>     <br>
                <h2>Supervisor Details</h2>
    <hr>


    <div class="col-md-6">
                  <label for="inputName5" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="FullName" name="FullName" required>
                </div>
                <div class="col-md-6">
       
                  <label for="inputName5" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" required>
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
$('#username').val('').attr('disabled',false);
$('#email').val('').attr('disabled',false);
$('#contact').val('').attr('disabled',false);

$('#company_name').val('').attr('disabled',false);
$('#company_email').val('').attr('disabled',false);
$('#company_address').val('').attr('disabled',false);
$('#company_department').val('').attr('disabled',false);


});

      $(document).on("click",".edit",function() {

      var id = $(this).data('id');
      var ic = $(this).data('ic');
      var gender = $(this).data('gender');
      var contact = $(this).data('contact');
      var username = $(this).data('username');
      var email = $(this).data('email');
      var fullname = $(this).data('fullname');


      var cname = $(this).data('cname');
      var cemail = $(this).data('cemail');
      var caddress = $(this).data('caddress');
      var department = $(this).data('department');


      $('#submit').show();
      $('#ID').val(id);
      $('#TYPE').val('EDIT');
      $('#FullName').val(fullname).attr('disabled',false);
      $('#IC').val(ic).attr('disabled',false);
      $('#gender').val(gender).attr('disabled',false);
      $('#username').val(username).attr('disabled',false);
      $('#email').val(email).attr('disabled',false);
      $('#contact').val(contact).attr('disabled',false);


      $('#company_name').val(cname).attr('disabled',false);
      $('#company_email').val(cemail).attr('disabled',false);
      $('#company_address').val(caddress).attr('disabled',false);
      $('#company_department').val(department).attr('disabled',false);
      
});

$(document).on("click",".view",function() {

      var id = $(this).data('id');
      var ic = $(this).data('ic');
      var gender = $(this).data('gender');
      var contact = $(this).data('contact');
      var username = $(this).data('username');
      var email = $(this).data('email');
      var fullname = $(this).data('fullname');


      var cname = $(this).data('cname');
      var cemail = $(this).data('cemail');
      var caddress = $(this).data('caddress');
      var department = $(this).data('department');


      $('#submit').hide();
      $('#ID').val('');
      $('#TYPE').val('VIEW');
      $('#FullName').val(fullname).attr('disabled',true);
      $('#IC').val(ic).attr('disabled',true);
      $('#gender').val(gender).attr('disabled',true);
      $('#username').val(username).attr('disabled',true);
      $('#email').val(email).attr('disabled',true);
      $('#contact').val(contact).attr('disabled',true);
      $('#company_name').val(cname).attr('disabled',true);
      $('#company_email').val(cemail).attr('disabled',true);
      $('#company_address').val(caddress).attr('disabled',true);
      $('#company_department').val(department).attr('disabled',true);

});

    });
  </script>

@include('Navigation.footer')