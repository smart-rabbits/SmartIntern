@include('Navigation.app')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<main id="main" class="main">

<div class="pagetitle">
  <h1>My Logbooks</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">My Logbooks</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
      <div class="card">
            <div class="card-body">

  <h5 class="card-title">My Logbooks   <button type="button" style="float:right;"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary create">Add New</button>   </h5>

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
      <th scope="col">Type</th>
      <th scope="col">Logbook Date & Time</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($logbooks as $key => $logbook)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>{{ $logbook->type }}</td>
      <td>{{ Carbon\Carbon::parse($logbook->created_at)->formatLocalized('%d %b %Y') }} {{ Carbon\Carbon::parse($logbook->created_at)->format('g:i A') }}</td>
      <td>{{ $logbook->total_marks }}%</td>
      <td>

      @if($logbook->marks_sv == '' && $logbook->marks_company == '')
        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" class="btn btn-outline-primary edit"
        data-id="{{ $logbook->id }}"
        data-type="{{ $logbook->type }}"
        data-notes="{{ $logbook->notes }}"
        data-marks_sv="{{ $logbook->marks_sv }}"
        data-marks_company="{{ $logbook->marks_company }}"
        data-total_marks="{{ $logbook->total_marks }}"
        data-document="{{ $logbook->document }}"
        >Edit</button>      
        @endif

        <button type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" 
        data-id="{{ $logbook->id }}"
        data-type="{{ $logbook->type }}"
        data-notes="{{ $logbook->notes }}"
        data-marks_sv="{{ $logbook->marks_sv }}"
        data-marks_company="{{ $logbook->marks_company }}"
        data-total_marks="{{ $logbook->total_marks }}"
        data-document="{{ $logbook->document }}"
        
        class="btn btn-outline-warning view">View</button>
        
        @if($logbook->marks_sv == '' && $logbook->marks_company == '')
      <a href="deleteLogbook/{{ $logbook->id }}"><button type="button" onclick="return confirm('Are you sure you want delete this Logbook?');" class="btn btn-outline-danger">Delete</button></a>
        @endif
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
                      <h5 class="modal-title">Logbook</h5>
                      <button type="button" class="btn-close create" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
            <div class="card-body">
              <!-- Multi Columns Form -->

              <form class="row g-3" action="storelogbook" method="POST" autocomplete="off" aria-autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="TYPE" id="TYPE" value="CREATE">
    <input type="hidden" name="ID" id="ID">

             <div class="col-md-6">
                  <label for="inputName5" class="form-label">Type</label>
                  <select id="type_col" name="type_col" class="form-select" required>
                  <option value="" selected disabled>-- Select Logbook Type --</option>
                  <option value="Daily">Daily</option>
                  <option value="Weekly">Weekly</option>
                 </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Document <sup style="color:blue;" id="doc" style="display:none;">Note: Uploading new document will replace existing document!</sup></label>
                  <input type="file" class="form-control" id="document" name="document[]" accept=
"application/msword,application/pdf, image/*" required>
                  <br>
                  <p class="doc_exist"><a id="docurl" href="#" style="font-weight:bolder;" target="_blank">Click Here</a> to view file</p>
                </div>
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Notes</label>
                  <textarea class="form-control" id="notes" name="notes" rows="10" max-length="900" required></textarea>
                </div>

                <br>     <br>
                <h2>Marks</h2>
    <hr>


    <div class="col-md-6">
                  <label for="inputName5" class="form-label">Faculty Supervisor Marks</label>
                  <input type="text" class="form-control" id="marks_sv" name="marks_sv" disabled>
                </div>
                <div class="col-md-6">
       
                  <label for="inputName5" class="form-label">Company Supervisor Marks</label>
                  <input type="text" class="form-control" id="marks_company" name="marks_company" disabled>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Total Marks</label>
                  <input type="text" class="form-control" id="total_marks" name="total_marks" disabled>
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
        $("#docurl").attr("href", "#");
        $('#document').attr('required',true);
        $('.doc_exist').hide();
$('#doc').hide();
$('#document').show();
$('#submit').show();
$('#ID').val('');
$('#TYPE').val('CREATE');
$('#type_col').val('').attr('disabled',false);
$('#notes').val('').attr('disabled',false);
$('#marks_sv').val('');
$('#marks_company').val('');
$('#total_marks').val('');

});

      $(document).on("click",".edit",function() {

      var id = $(this).data('id');
      var type = $(this).data('type');
      var notes = $(this).data('notes');
      var marks_sv = $(this).data('marks_sv');
      var marks_company = $(this).data('marks_company');
      var total_marks = $(this).data('total_marks');
      var document = $(this).data('document');

      $('#document').attr('required',false);
      $('.doc_exist').show();
      $("#docurl").attr("href", "Logbook/"+document);
      $('#doc').show();
      $('#document').show();
    $('#submit').show();
    $('#ID').val(id);
    $('#TYPE').val('EDIT');
    $('#type_col').val(type).attr('disabled',false);
    $('#notes').val(notes).attr('disabled',false);
    $('#marks_sv').val(marks_sv);
    $('#marks_company').val(marks_company);
    $('#total_marks').val(total_marks+'%');
});

$(document).on("click",".view",function() {



    var id = $(this).data('id');
      var type = $(this).data('type');
      var notes = $(this).data('notes');
      var marks_sv = $(this).data('marks_sv');
      var marks_company = $(this).data('marks_company');
      var total_marks = $(this).data('total_marks');
      var document = $(this).data('document');

      $('.doc_exist').show();
      $('#document').attr('required',false);
      $("#docurl").attr("href", "Logbook/"+document);
      $('#doc').hide();
      $('#document').hide();
    $('#submit').hide();
    $('#ID').val(id);
    $('#TYPE').val('EDIT');
    $('#type_col').val(type).attr('disabled',true);
    $('#notes').val(notes).attr('disabled',true);
    $('#marks_sv').val(marks_sv);
    $('#marks_company').val(marks_company);
    $('#total_marks').val(total_marks+'%');

});

    });
  </script>

@include('Navigation.footer')