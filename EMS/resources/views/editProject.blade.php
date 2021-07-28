<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<h3>Project Details</h3>
<form action = "editproj" method="post">
    @csrf
    <div class="col-lg-4">
    <div class="form-group">
    @foreach ($proj as $item)
    <input type="number" class="form-control" name="project_id" value="{{ $item->project_id }}"><br>
    <input type="text" class="form-control" name="project_name" value="{{ $item->project_name }}"><br>
    <textarea type="text" class="form-control" name="project_desc">{{ $item->project_desc }}
    </textarea><br>
    
        <input type="text" class="form-control" name="project_start_date" value="{{ $item->project_start_date }}"><br>
    <input type="date" class="form-control" name="project_end_date" value="{{ $item->project_end_date }}">
    @endforeach
    <br><button type = "submit">Update</button>
    </div>
    </div>
</form>