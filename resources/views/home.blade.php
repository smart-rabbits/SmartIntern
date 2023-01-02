@include('Navigation.app')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      @if(auth()->user()->role == 'Student')
      <?php
$totaldaily = App\logbooks::where('student_id',auth()->user()->id)->where('type','Daily')->count();
$totalweekly = App\logbooks::where('student_id',auth()->user()->id)->where('type','Weekly')->count();
?>
      <!-- Left side columns -->
      <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

  

                <div class="card-body">
                  <h5 class="card-title">Total Daily Logbook</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-medical"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totaldaily }}</h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Total Weekly Logbook</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalweekly }}</h6>
                   

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            </div><!-- End Revenue Card -->
            </div><!-- End Revenue Card -->

            @elseif(auth()->user()->role == 'Admin')
            <?php
$totalstudent = App\User::where('role','Student')->count();
$totalsupervisor = App\User::where('role','Faculty Supervisor')->count();
$totalcompany = App\User::where('role','Company Supervisor')->count();
?>
               <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

  

                <div class="card-body">
                  <h5 class="card-title">Total Student</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalstudent }}</h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Total Faculty Supervisor</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalsupervisor }}</h6>
                   

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">



                <div class="card-body">
                <h5 class="card-title">Total Company Supervisor</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalcompany }}</h6>
                 

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

      

          </div>
        </div><!-- End Left side columns -->
        @elseif(auth()->user()->role == 'Faculty Supervisor')

        <?php
      $id = App\FacultySupervisor::where('user_id',auth()->user()->id)->first()->id;

      $totalstudents =  App\Students::where('faculty_sv_id',$id)->count();

      $studentid =  App\Students::where('faculty_sv_id',$id)->pluck('user_id');

      $totallogbooks = App\logbooks::whereIn('student_id',$studentid)->count();

?>
               <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

  

                <div class="card-body">
                  <h5 class="card-title">My Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalstudents }}</h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Total Logbooks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totallogbooks }}</h6>
                   

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

        

      

          </div>
        </div><!-- End Left side columns -->

        @elseif(auth()->user()->role == 'Company Supervisor')

        <?php
       $id = App\CompanySupervisor::where('user_id',auth()->user()->id)->first()->company_id;

      $totalstudents =  App\Students::where('company_id',$id)->count();

      $studentid =  App\Students::where('company_id',$id)->pluck('user_id');

      $totallogbooks = App\logbooks::whereIn('student_id',$studentid)->count();

?>
         <!-- Left side columns -->
         <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

  

                <div class="card-body">
                  <h5 class="card-title">My Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalstudents }}</h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Total Logbooks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totallogbooks }}</h6>
                   

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

        

      

          </div>
        </div><!-- End Left side columns -->
        @endif

      

      </div>
    </section>

  </main><!-- End #main -->

  @include('Navigation.footer')