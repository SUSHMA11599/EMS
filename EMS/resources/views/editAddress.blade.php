<form action="updateAddress" method="post">
    @csrf
    <div class="col-lg-4">
    <div class="form-group">
     <h2>update Address</h2>
 <input type="text" class="form-control" name="newAddress" placeholder="enter new Address"><br><br>
 @if(session()->has('message'))
 <div class="alert alert-success">
     {{ session()->get('message') }}
 </div>
@endif
    <button type="submit" class="btn btn-primary">Update</button>

  
    </div>
    </div>
</form>