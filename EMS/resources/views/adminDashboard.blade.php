<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container">
   
        <h1>Welcome To EMS</h1>
        @csrf
        <h3>These are the employees Registerd</h3>
        <table border="2">

            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Delete</th>
                <th>view details</th>
                <th>edit details</th>
                <th>project working on</th>

            </tr>
            @foreach($Users as $user)
            @if ($user->type_of_user != 'Admin')
            <tr>
                <td>{{ $user->emp_id }}</td>
                <td>{{ $user->first_name ." ". $user->last_name}}</a></td>
                <td><a href={{"delete/". $user->emp_id}}>Delete</a></td>
                <td><a href={{"empDet/".$user->emp_id}}>view details</a></td>
                <td><a href={{"edit/". $user->emp_id}}>edit details</a></td>
                <td><a href={{"projdet/".$user->emp_id}}>view Projects</a></td>
            </tr>
            @endif
            @endforeach
        </table>

        @if(Session::has('success'))
        <div class="alert alert-success">{{session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{session::get('fail')}}</div>
        @endif

        <h3>These are the projects</h3>
        <table border="2">

            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Project Description </th>
                <th>Project Start Date</th>
                <th>Project End Date </th>
                <th>delete project</th>
                <th>Operation</td>
            </tr>

            @foreach($projects as $p)
            <tr>
                <td>{{ $p->project_id }}</td>
                <td>{{ $p->project_name}}</td>
                <td>{{ $p->project_desc }}</td>
                <td>{{ $p->project_start_date }}</td>
                <td>{{ $p->project_end_date }}</td>
                <td><a href={{"deleteProj/". $p->project_id}}>delete</a></td>
                <td><a href={{"editproj/". $p->project_id}}>Edit project details</a></td>
                @endforeach
        </table>
        <a href="delp">
        <button>Click here to delete the project</button></a>

        <h3>These are the issues</h3>
        <table border="2">

            <tr>
                <th>type </th>
                <th>description </th>
                <th>raised by(emp ID) </th>
                <th>status</th>
                <th>Edit Status</th>
            </tr>
            @foreach($issues as $i)

            <tr>
                <td>{{ $i->issue_type }}</td>
                <td>{{ $i->issue_desc}}</td>
                <td>{{ $i->emp_id }}</td>
                <td>{{ $i->status }}</td>
                <td>

                    <form action="updateStat" id="updateform" method="POST">
                        <div class="col-lg-4">
                            <div class="form-group">
                                @csrf


                                <form action="updatestatus" method="post">
                                    {{method_field('PUT')}}
                                    @csrf
                                    <input name="id" value={{$i->issue_id}} hidden>
                                    <select id="statusUpdate" name="status">
                                        <option value="closed">closed</option>
                                        <option value="proccecing">proccecing</option>
                                    </select>

                                    <button type="submit">submit</button>

                                </form>
                </td>

                @endforeach
        </table>


        <h3>Add a new project</h3>
        <form action="addProj" method="POST">
            <div class="col-lg-4">
                <div class="form-group">
                    @csrf
                    <input type="text" class="form-control" name="project_name"
                        placeholder="Enter project name">
                        <span style="color:red">
                          @error('project_name')
                          {{$message}}
                          @enderror
                      </span><br><br>

                    <label>Enter project Description</label>
                    <textarea type="text" class="form-control" name="project_desc"> </textarea>
                    <span style="color:red">
                      @error('project_desc')
                      {{$message}}
                      @enderror
                  </span>
                  <br>

                    <label>Enter Project Start Date</label>
                    <input type="date" class="form-control" name="project_start_date">
                    <span style="color:red">
                      @error('project_start_date')
                      {{$message}}
                      @enderror
                  </span>
                  <br><br>


                    <label>Enter Project End Date</label>
                    <input type="date" class="form-control" name="project_end_date">
                    <span style="color:red">
                      @error('project_end_date')
                      {{$message}}
                      @enderror
                  </span>
                  <br><br>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </div>
        </form>

        <a href="login">
            @csrf
            <button type="submit">Logout</button>
           </a>

</div>