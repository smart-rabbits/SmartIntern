@include('Navigation.app')


<main id="main" class="main">

<div class="pagetitle">
  <h1>My Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">My Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="../assets/img/user.png" alt="Profile" class="rounded-circle">
          <h2>{{ auth()->user()->username }}</h2>
          <h3>{{ auth()->user()->role }}</h3>
         
        </div>
      </div>

    </div>

    <div class="col-xl-8">

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

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            @if(auth()->user()->role == 'Company Supervisor' || auth()->user()->role == 'Faculty Supervisor' || auth()->user()->role == 'Admin')
            <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
            @endif

  

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
     

              @if(auth()->user()->role == 'Student')

              <?php
              $data = App\Students::where('user_id',auth()->user()->id)->first();
              ?>
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $data->FullName }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">IC Number <sup style="color:blue;">[Password]</sup></div>
                <div class="col-lg-9 col-md-8">{{ $data->IC }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Faculty</div>
                <div class="col-lg-9 col-md-8">{{ $data->Faculty }}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Course</div>
                <div class="col-lg-9 col-md-8">{{ $data->Course }}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Year</div>
                <div class="col-lg-9 col-md-8">{{ $data->Year }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Matric Number</div>
                <div class="col-lg-9 col-md-8">{{ $data->matricNum }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $data->gender }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact</div>
                <div class="col-lg-9 col-md-8">{{ $data->contact }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $data->address }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">CGPA</div>
                <div class="col-lg-9 col-md-8">{{ $data->CGPA }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Faculty Supervisor</div>
                <div class="col-lg-9 col-md-8">{{ $data->FACULTY->FullName }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company Supervisor</div>
                <div class="col-lg-9 col-md-8">{{ $data->COMPANY->FullName }}</div>
              </div>

              @elseif(auth()->user()->role == 'Admin')
              <?php
              $data = App\Admin::where('user_id',auth()->user()->id)->first();
              ?>
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Username</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">IC Number</div>
                <div class="col-lg-9 col-md-8">{{ $data->IC }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Staff ID</div>
                <div class="col-lg-9 col-md-8">{{ $data->staffID }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $data->gender }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact</div>
                <div class="col-lg-9 col-md-8">{{ $data->contact }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $data->address }}</div>
              </div>

              @elseif(auth()->user()->role == 'Faculty Supervisor')
              <?php
              $data = App\FacultySupervisor::where('user_id',auth()->user()->id)->first();
              ?>
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $data->FullName }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">IC Number  <sup style="color:blue;">[Password]</sup></div>
                <div class="col-lg-9 col-md-8">{{ $data->IC }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Staff ID</div>
                <div class="col-lg-9 col-md-8">{{ $data->staffID }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $data->gender }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact</div>
                <div class="col-lg-9 col-md-8">{{ $data->contact }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Faculty</div>
                <div class="col-lg-9 col-md-8">{{ $data->faculty }}</div>
              </div>


              
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $data->address }}</div>
              </div>

              @elseif(auth()->user()->role == 'Company Supervisor')

              <?php
              $data = App\CompanySupervisor::where('user_id',auth()->user()->id)->first();
              $data2 = App\Company::where('id',$data->company_id)->first();
              ?>
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $data->FullName }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">IC Number  <sup style="color:blue;">[Password]</sup></div>
                <div class="col-lg-9 col-md-8">{{ $data->IC }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $data->gender }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact</div>
                <div class="col-lg-9 col-md-8">{{ $data->contact }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company Name</div>
                <div class="col-lg-9 col-md-8">{{ $data2->company_name }}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company Email</div>
                <div class="col-lg-9 col-md-8">{{ $data2->company_email }}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Department</div>
                <div class="col-lg-9 col-md-8">{{ $data2->company_department }}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company Address</div>
                <div class="col-lg-9 col-md-8">{{ $data2->company_address }}</div>
              </div>

              @endif

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="profileupd" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
              @csrf
              @if(auth()->user()->role == 'Student')

              <?php
              $data = App\Students::where('user_id',auth()->user()->id)->first();
              ?>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="FullName"  id="FullName" value="{{ $data->FullName }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                  <select id="gender" name="gender" class="form-select" required>
                  <option value="" selected disabled>-- Select Gender --</option>
                  <option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
                  <option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
                 </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="contact" type="number" class="form-control" id="contact" value="{{ $data->contact }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                  <textarea class="form-control" id="address" name="address" rows="5" required>{{ $data->address }}</textarea>
                  </div>
                </div>
                @elseif(auth()->user()->role == 'Admin')


              <?php
              $data = App\Admin::where('user_id',auth()->user()->id)->first();
              ?>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                  <select id="gender" name="gender" class="form-select" required>
                  <option value="" selected disabled>-- Select Gender --</option>
                  <option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
                  <option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
                 </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="contact" type="number" class="form-control" id="contact" value="{{ $data->contact }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                  <textarea class="form-control" id="address" name="address" rows="5" required>{{ $data->address }}</textarea>
                  </div>
                </div>

                @elseif(auth()->user()->role == 'Faculty Supervisor')
              
                <?php
              $data = App\FacultySupervisor::where('user_id',auth()->user()->id)->first();
              ?>

<div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="FullName"  id="FullName" value="{{ $data->FullName }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                  <select id="gender" name="gender" class="form-select" required>
                  <option value="" selected disabled>-- Select Gender --</option>
                  <option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
                  <option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
                 </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="contact" type="number" class="form-control" id="contact" value="{{ $data->contact }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                  <textarea class="form-control" id="address" name="address" rows="5" required>{{ $data->address }}</textarea>
                  </div>
                </div>
                @elseif(auth()->user()->role == 'Company Supervisor')

                <?php
              $data = App\CompanySupervisor::where('user_id',auth()->user()->id)->first();
              ?>

<div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="FullName"  id="FullName" value="{{ $data->FullName }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                  <select id="gender" name="gender" class="form-select" required>
                  <option value="" selected disabled>-- Select Gender --</option>
                  <option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
                  <option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
                 </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="contact" type="number" class="form-control" id="contact" value="{{ $data->contact }}">
                  </div>
                </div>

                @endif

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="changepass" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
              @csrf

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" class="form-control" name="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" class="form-control" name="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="renewPassword" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@include('Navigation.footer')