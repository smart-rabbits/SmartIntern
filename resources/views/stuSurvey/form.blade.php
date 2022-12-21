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

<h5 class="card-title">Survey after Internship</h5>

<!DOCTYPE html>
<html>
    <body>
        <form class="form-horizontal" method="POST" action="/stuSurvey" action="/action_page.php>

          {{ csrf_field() }}
              
          <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required>
          </div>
          <div class="form-group">
            <label for="matricnumber">Matric Number: </label>
            <input type="text" class="form-control" id="matricnumber" placeholder="A00EX0000" name="matricnumber" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact: </label>
            <input type="text" class="form-control" id="contact" placeholder="012-3456789" name="contact" required>
          </div>
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" id="email" placeholder="name@gmail.com" name="email" required>
          </div>
          <div class="form-group">
            <label for="yearcourse">Year and Course of Study: </label>
            <input type="text" class="form-control" id="yearcourse" placeholder="2/SXXX" name="yearcourse" required>
          </div>
          <div class="form-group">
            <label for="company">Company of Internship: </label>
            <input type="text" class="form-control" id="company" placeholder="Sinar Sdn.Bhd" name="company" required>
          </div>
          <div class="form-group">
            <label for="compaddress">Address: </label>
            <textarea type="text" class="form-control" id="compaddress" name="message" required> </textarea>
          </div>
          <div class="form-group">
            <label for="learn">What had you learn during the internship: </label>
            <textarea type="text" class="form-control" id="learn"  name="learn" required> </textarea>
          </div>
          <div class="form-group">
            <label for="prefer">Would you prefer to work in your internship company?</label>
            <br>
              <input type="radio" id="prefer" name="prefer" required checked>Yes</input>
              <input type="radio" id="prefer">No</input>
          </div>
          <div class="form-group">
            <label for="preferwhy">Why?</label>
            <textarea type="text" class="form-control" id="preferwhy" name="preferwhy" required> </textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
          </div>
        </form>
    </body>
</html>

</section>

</main><!-- End #main -->

@include('Navigation.footer')