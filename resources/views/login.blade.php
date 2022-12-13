<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Intern</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/internship.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/internship.png" alt="">
                  <span class="d-none d-lg-block">SmartIntern</span>
                </a>
              </div><!-- End Logo -->
              @if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
              <div class="card mb-3">




                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your credential to login</p>
                  </div>

   

                  <form class="row g-3" action="loginuser" method="POST" autocomplete="off" aria-autocomplete="off">
                                            @csrf

                  <div class="col-12">
                      <label for="yourPassword" class="form-label">Role</label>
                      <select class="form-control" name="role" id="role">
                      <option value="admin">Administrator</option>
                        <option value="student" selected>Student</option>
                        <option value="fsup">Faculty Supervisor</option>
                        <option value="csup">Company Supervisor</option>
                      </select>
                    </div>

                    <div class="col-12 student">
                      <label for="matricno" class="form-label">Matric No</label>
                      <div class="input-group has-validation">
                        <input type="text" name="matricno" maxlength="10" class="form-control" id="matricno" required>
                      </div>
                    </div>

                    <div class="col-12 staff" style="display:none;">
                      <label for="staffid" class="form-label">Staff ID</label>
                      <div class="input-group has-validation">
                        <input type="text" name="staffid" maxlength="10" class="form-control" id="staffid" >
                      </div>
                    </div>

                    <div class="col-12 company" style="display:none;">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" maxlength="200" class="form-control" id="email" >
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <script>
    $( "#role" ).change(function() {
  var role = $(this).val();

  if(role == "admin"){

    $('.student').hide();
    $('.staff').show();
    $('.company').hide();

    $("#matricno").attr('required',false);
    $("#staffid").attr('required',true);
    $("#email").attr('required',false);


  }
  else if(role == "student"){

    $('.student').show();
    $('.staff').hide();
    $('.company').hide();

    $("#matricno").attr('required',true);
    $("#staffid").attr('required',false);
    $("#email").attr('required',false);

  }
  else if(role == "fsup"){

    $('.student').hide();
    $('.staff').show();
    $('.company').hide();

    $("#matricno").attr('required',false);
    $("#staffid").attr('required',true);
    $("#email").attr('required',false);

  }
  else if(role == "csup"){
    $('.student').hide();
    $('.staff').hide();
    $('.company').show();

    $("#matricno").attr('required',false);
    $("#staffid").attr('required',false);
    $("#email").attr('required',true);

  }
});
  </script>

</body>

</html>