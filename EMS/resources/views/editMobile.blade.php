<form action="updateMobile"  method="post">
    @csrf
    
    <div class="col-lg-4">
    <div class="form-group">
     <h2>update mobile number</h2>

    <input type="text" class="form-control" name="newMobileNumber" placeholder="enter new mobile number"><br><br>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <button type="submit" class="btn btn-primary">Update</button> 

    
</form>