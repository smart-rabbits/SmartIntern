<!DOCTYPE html>
<html>
    <div class="row">
        <div class="col-md-12">
         <br />
         <h3 align="center">Supervisor Survey</h3>
         <br />
         @if($message = Session::get('success'))
         <div class="alert alert-success">
          <p>{{$message}}</p>
         </div>
         @endif
         <div align="right">
          <a href="{{route('svSurvey.show')}}" class="btn btn-primary">Add</a>
          <br />
          <br />
         </div>          
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Supervisor Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Student Name</th>
                    <th>Rate</th>
                    <th>Reason</th>
                    <th>Comment</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->svName }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->svCompany }}</td>
                    <td>{{ $row->svStu }}</td>
                    <td>{{ $row->rate }}</td>
                    <td>{{ $row->reason }}</td>
                    <td>{{ $row->comment }}</td>
                </tr>
                @endforeach
            </table>
</body>
</html>