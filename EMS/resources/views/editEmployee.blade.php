<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<h3>Update Employee details</h3>

<form action="updateEmpDet" method="post">
    @csrf
    <div class="col-lg-4">
        <div class="form-group">
            @foreach ($emp as $item)

            <label for="">Employee Id</label>
            <input type="number" class="form-control" name="emp_id" value="{{ $item->emp_id }}"><br>

            <label for="">Employee Phone Number</label>
            <input type="number" class="form-control" name="phone_number" value="{{ $item->phone_number }}"><br>

            <label for="">Employee Address</label>
            <input type="text" class="form-control" name="comm_address" value="{{ $item->comm_address }}"><br>

            <label for="">Employee Password</label>
            <input type="text" class="form-control" name="password" value="{{ $item->password }}"><br>

            <label for="">Employee Date of Birth</label>
            <input type="text" class="form-control" name="dob" value="{{ $item->DOB   }}"><br>

            <label for="">Employee gender</label>
            <input type="text" class="form-control" name="gender " value="{{ $item->gender }}"><br>

            <label for="">Employee City</label>
            <input type="text" class="form-control" name="city" value="{{ $item->city }}"><br>

            <label for="">Type of User</label>
            <input type="text" class="form-control" name="type_of_user" value="{{ $item->type_of_user }}"><br><br>

            <button type="submit">update</button>
            @endforeach
        </div>
    </div>
</form>