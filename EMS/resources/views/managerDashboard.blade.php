<table  border="2">

    <tr>
        <th>Emp ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Mobile Number</th>
        <th>Date Of Birth</th>
        <th>Communication Address</th>
        <th>Gender</th>
        <th>City</th>      
        </tr>
    @foreach($userdata as $user)
           <tr>
           <td>{{ $user->emp_id }}</td>
           <td>{{ $user->first_name ." ". $user->last_name}}</td>
           <td>{{ $user->password }}</td>
           <td>{{ $user->phone_number }}</td>
           <td>{{ $user->DOB }}</td>
           <td>{{ $user->comm_address }}</td>
           <td>{{ $user->gender }}</td>
           <td>{{ $user->city }}</td>      
           </tr>
           @endforeach 
   </table>

   <br><br>
   <h3>You can raise your issue here</i></h3>
   <form action="issue" method="GET">
               @csrf
              <div class="col-lg-4">
              <div class="form-group">
                <input type="number" class="form-control"  name="emp_id" value="{{ $user->emp_id }}" hidden >
                  <input type="text" class="form-control"  name="issue_type"  placeholder="Enter issue type"><br><br>
                  <input type="text" class="form-control"  name="issue_desc"  placeholder="Enter issue description"><br><br>
                  <button type="submit" class="btn btn-warning">Submit Issue</button>
                  <br>
              </div>
              </div>
   </form>

   <table  border="2">

    <tr>
        <th>type </th>
        <th>description </th>
        <th>raised by(emp ID)  </th>
        <th>status </th>
    </tr>

    @foreach($issues as $i)
           
           <tr>
            <td>{{ $i->issue_type }}</td>
            <td>{{ $i->issue_desc}}</td>
            <td>{{ $i->emp_id }}</td>
            <td>{{ $i->status }}</td>
           
           @endforeach 
   </table>