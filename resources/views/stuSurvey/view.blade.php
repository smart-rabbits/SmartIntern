<!DOCTYPE html>
<html>
    <div class="row">
        <div class="col-md-12">
         <br />
         <h3 align="center">Student Survey</h3>
         <br />
         @if($message = Session::get('success'))
         <div class="alert alert-success">
          <p>{{$message}}</p>
         </div>
         @endif
         <div align="right">
          <a href="{{route('stuSurvey.show')}}" class="btn btn-primary">Add</a>
          <br />
          <br />
         </div>          
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Student Name</th>
                    <th>Matric Number</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Year/Course</th>
                    <th>Company</th>
                    <th>Company Address</th>
                    <th>Lesson learnt</th>
                    <th>Prefer</th>
                    <th>Reason</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->matricnumber }}</td>
                    <td>{{ $row->contact }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->yearcourse }}</td>
                    <td>{{ $row->company }}</td>
                    <td>{{ $row->compaddress }}</td>
                    <td>{{ $row->learn }}</td>
                    <td>{{ $row->prefer }}</td>
                    <td>{{ $row->preferwhy }}</td>
                </tr>
                @endforeach
            </table>
</body>
</html>