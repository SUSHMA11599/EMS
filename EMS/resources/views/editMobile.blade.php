<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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