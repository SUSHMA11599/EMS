<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<h3>Employee details</h3>
<form action = "updateEmpDet" method="post">
    @csrf
    <div class="col-lg-4">
    <div class="form-group">
   @foreach ($emp as $item)
    <input type="number" class="form-control" name="emp_id" value="{{ $item->emp_id }}"><br>
    <input type="number" class="form-control" name="phone_number" value="{{ $item->phone_number }}"><br>
    <input type="text" class="form-control" name="comm_address" value="{{ $item->comm_address }}"><br>
    <input type="text" class="form-control" name="dob" value="{{ $item->DOB   }}"><br>
    <input type="text" class="form-control" name="gender " value="{{ $item->gender }}"><br>
    <input type="text" class="form-control" name="city" value="{{ $item->city }}"><br>
    <input type="text" class="form-control" name="type_of_user" value="{{ $item->type_of_user }}"><br><br>
    <br><button type="submit">Update</button>
    @endforeach
    </div>
    </div>
</form>