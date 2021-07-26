<table border="2">
        @foreach($data as $user)
               <tr>
               <td>Emp ID : {{ $user->emp_id }}</td>
               <td>Name : {{ $user->first_name ." ". $user->last_name}}</td>
               <td>Password : {{ $user->password }}</td>
               <td>Phone_number :{{ $user->phone_number }}</td>
               <td>DOB :{{ $user->DOB }}</td>
               <td>Address :{{ $user->comm_address }}</td>
               <td>Gender :{{ $user->gender }}</td>
               <td>City :{{ $user->city }}</td>      
               </tr>
               @endforeach 
       </table>
   
       <br><br><h3>You can raise your issue here</i></h3>
       <form action="issue" method="GET">
                   @csrf
                  <div class="col-lg-4">
                  <div class="form-group">
                      <input type="text" class="form-control"  name="issue_type"  placeholder="Enter issue type"><br><br>
                      <input type="text" class="form-control"  name="issue_desc"  placeholder="Enter issue description"><br><br>
                      <button type="submit" class="btn btn-warning">Submit Issue</button>
                      <br>
                  </div>
                  </div>
       </form>