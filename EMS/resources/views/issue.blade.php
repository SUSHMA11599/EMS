<h2>Raise your issue</h2>

<form action="issue" method="post">
@csrf
               <div class="form-group">
                   <input type="text" class="form-control"  name="issue_id" required  placeholder="Enter the issue id"><br><br>
                   <input type="text" class="form-control"  name="issue_type" required  placeholder="Enter issue type"><br><br>
                   <input type="date" class="form-control"  name="issue_desc" required  placeholder="Enter issue description"><br><br>
                   <button type="submit" class="btn btn-warning">Submit</button>
                   <br>
               </div>

</form>