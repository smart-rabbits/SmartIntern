@include('Navigation.app')

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

  <h5 class="card-title">Student Management   <button type="button" style="float:right;"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary">Create New</button>   </h5>

  @if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<!-- Table with stripped rows -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Matric No</th>
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
      <td>{{ $student->status }}</td>
      <td>
        <button type="button" class="btn btn-outline-primary">Edit</button>      
        <button type="button" class="btn btn-outline-warning">View</button>        
      <button type="button" class="btn btn-outline-danger">Delete</button>

    </td>
    </tr>
    @empty
    <tr>
      <th scope="row" colspan="5" style="text-align:center;">No Data Available</th>

    </td>
    </tr>

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
                      <h5 class="modal-title">Add New Student</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
            <div class="card-body">
              <!-- Multi Columns Form -->

              <form class="row g-3" action="storestudent" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
    @csrf
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
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                </div>
                <hr>
    
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Company | Company Supervisor</label>
                  <select id="company_id" name="company_id" class="form-select" required>
                    <option selected disabled>-- Select Company | Company Supervisor --</option>
                    <option>...</option>
                  </select>
                </div>

             

            </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form><!-- End Multi Columns Form -->
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->



    </section>

  </main><!-- End #main -->

@include('Navigation.footer')