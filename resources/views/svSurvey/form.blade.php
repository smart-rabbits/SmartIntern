@include('Navigation.app')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Survey after Internship</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Home</a></li>
      <li class="breadcrumb-item active">Survey after Internship</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="card">
        <div class="card-body">
          
<h5 class="card-title">Feedback Form</h5>

<!DOCTYPE html>
<html>
    <body>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <form class="form-group" method="post" action="/svSurvey" action="/action_page.php">

          {{ csrf_field() }}
              
          <div class="form-group">
            <label for="svName">Name of the supervisor: </label>
            <input type="text" class="form-control" id="svName" placeholder="Supervisor Name" name="svName" required>
           </div> <br>
           <div class="form-group">
            <label for="email">Email of the supervisor: </label>
            <input type="text" class="form-control" id="email" placeholder="Supervisor Email" name="email" required>
           </div> <br>
           <div class="form-group">
            <label for="svName">Name of the company: </label>
            <input type="text" class="form-control" id="svCompany" placeholder="Company Name" name="svCompany" required>
           </div> <br>
           <div class="form-group">
            <label for="svName">Name of the student: </label>
            <input type="text" class="form-control" id="svStu" placeholder="Student Name" name="svStu" required>
           </div> <br>
           <div class="form-group">
            <label for="rating">How would you rate your intern in terms of work ethics, attitude, and responsibility?: </label>
            <input type="radio" id="rate1" name="rate" value="1">
            <label for="rate1">1</label>&nbsp
            <input type="radio" id="rate2" name="rate" value="2">
            <label for="rate2">2</label>&nbsp
            <input type="radio" id="rate3" name="rate" value="3">
            <label for="rate3">3</label>&nbsp
            <input type="radio" id="rate4" name="rate" value="4">
            <label for="rate4">4</label>&nbsp
            <input type="radio" id="rate5" name="rate" value="5">
            <label for="rate5">5</label><br>
           </div><br>
           <div class="form-group">
            <label for="message">Would you be willing to hire this student? Why?: </label>
            <textarea type="text" class="form-control" id="reason" name="reason" required> </textarea>
           </div><br>
           <div class="form-group">
            <label for="comment">Overall comments/suggestions: </label>
            <textarea type="text" class="form-control" id="comment" name="comment" required> </textarea>
           </div><br>
           <div class="form-group">
             <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
           </div>
           
        </form>
    </body>
</html>

</section>
