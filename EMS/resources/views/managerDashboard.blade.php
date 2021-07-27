<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<h3>Here is your Personal Data</h3>
<body class = "container">
<table border="2">

    <tr>
        <th>Emp ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Mobile Number</th>
        <th>Date Of Birth</th>
        <th>Communication Address</th>
        <th>Gender</th>
        <th>City</th>  
        <th>Operation</th>    
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
           <td>
            <a href="eMobile">edit mobile</a><br>
              <a href="eAddress">edit address</a>          
            </td> 
                
           </tr>
           @endforeach 
   </table>

   <br><br>
   <h3>You can raise your issue here</h3>
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

   <h3>These are the issues by your reporties</h3>
   <table border="1">

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

   <h3>These are the projects that Your handling</h3>
   <table border="1">

    <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Project Description </th>
        <th>Project Start Date</th>
        <th>Project End Date </th>
        <th>Operation</td>
    </tr>

    @foreach($projects as $p)
           <tr>
            <td>{{ $p->project_id }}</td>
            <td>{{ $p->project_name}}</td>
            <td>{{ $p->project_desc }}</td>
            <td>{{ $p->project_start_date }}</td>
            <td>{{ $p->project_end_date }}</td>           
           @endforeach 
   </table>

   <button>
   <a href="#addemp">add employee</a>
   </button>
   <button>
   <a href="#delemp">delete employee</a>
   </button>


   <form action="addEmp" id="addemp" method="post">
    <div class="col-lg-4">
      <div class="form-group">
        @csrf
        <input type="number" class="form-control"  name="manager_id" value="{{ $user->emp_id }}" hidden >
          <input type="number" class="form-control"  name="emp_id"  placeholder="Enter Employee-ID to add "><br><br>
          @error('emp_id')
          {{$message}}
          @enderror
          <input type="number" class="form-control"  name="proj_id"  placeholder="Enter Project-ID to add "><br><br>
          @error('proj_id')
          {{$message}}
          @enderror
          @if (session('done'))
          <div class="alert alert-success">
             {!! session('done') !!}
          </div>
          @endif
          @if (session('notdone'))
          <div class="alert alert-danger">
             {!! session('notdone') !!}
          </div>
          @endif

          <button type="submit" class="btn btn-warning">ADD</button>
          <br>
      </div>
      </div>
   </form>
   <form action="deleteEmp"" id="delemp" method="post">
    <div class="col-lg-4">
      <div class="form-group">
        @csrf
        <input type="number" class="form-control"  name="manager_id" value="{{ $user->emp_id }}" hidden >
          <input type="number" class="form-control"  name="emp_id"  placeholder="Enter Employee-ID to delete "><br><br>
          @if (session('success'))
          <div class="alert alert-success">
             {!! session('success') !!}
          </div>
          @endif
          @if (session('fail'))
          <div class="alert alert-danger">
             {!! session('fail') !!}
          </div>
          @endif

          <button type="submit" class="btn btn-warning">DELETE</button>
          <br>
      </div>
      </div>

   </form>
</body>