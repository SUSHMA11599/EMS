<form action="deleteProj" method="POST">
    @csrf
    <label for="">Enter the project Id that you want to Delete</label>
    <input type="number" class="form-control" name="project_id"><br>
    @if(Session::has('message'))
    <div class="alert alert-success">{{session::get('message')}}</div>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-danger">{{session::get('message')}}</div>
    @endif
    <button type="submit">Delete</button>
</form>