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

  <h5 class="card-title">My Logbooks [<b style="color:blue;">{{  $students->FullName }}</b>]</h5>

  <br>



<!-- Table with stripped rows -->
<table class="table table-striped" id="mytable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Type</th>
      <th scope="col">Logbook Date & Time</th>
      <th scope="col">Total Marks</th>
     
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
                  <input type="file" class="form-control" id="document" name="document[]" required>
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
                  <input type="number" step=".01" class="form-control" id="marks_sv" name="marks_sv" disabled>
                </div>
                <div class="col-md-6">
       
                  <label for="inputName5" class="form-label">Company Supervisor Marks</label>
                  <input type="number" step=".01" class="form-control" id="marks_company" name="marks_company" disabled>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Total Marks</label>
                  <input type="text" class="form-control" id="total_marks" name="total_marks" disabled>
                </div>
                
                <hr>

            </div>

                    </div>
                    
              </div><!-- End Extra Large Modal-->



    </section>

  </main><!-- End #main -->

  <script>
    

    });
  </script>

@include('Navigation.footer')