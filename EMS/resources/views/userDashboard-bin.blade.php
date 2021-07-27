<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mobile').hide()
        $('#editAddress').click(function () {
            $('#mobile').hide()
            $('#address').show()
        });
    });

    $(document).ready(function () {
        $('#address').hide()
        $('#editMobile').click(function () {
            $('#address').hide()
            $('#mobile').toggle(500)
        });
    });
</script>

<body class="container">
    <h3>Here is your Personal Data</h3>
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
        @foreach($data as $user)
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
                <a id="editMobile">edit mobile</a><br>
                <a id="editAddress">edit address</a>

            </td>
        </tr>
        @endforeach
    </table>

    <br><br>
    <h3>You can raise your issue here</i></h3>
    <form action="issue" method="GET">
        @csrf
        <div class="col-lg-4">
            <div class="form-group">
                <input type="number" name="emp_id" value="{{ $user->emp_id }}" readonly type="hidden" >
                <input type="text" name="issue_type" placeholder="Enter issue type"><br><br>
                <input type="text" "  name=" issue_desc" placeholder="Enter issue description"><br><br>
                <button type="submit" class="btn btn-warning">Submit Issue</button>
                <br>
            </div>
        </div>



    <div id="address">

        <form action="updateAddress" method="post">
            @csrf
            <div class="col-lg-4">
                <div class="form-group">
                    <h2>update Address</h2>
                    <input type="text" name="newAddress" placeholder="enter new Address"><br><br>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Update</button>


                </div>
            </div>
        </form>
    </div>


    <div id="mobile">
        <form action="updateMobile" method="post">
            @csrf

            <div class="col-lg-4">
                <div class="form-group">
                    <h2>update mobile number</h2>

                    <input type="text" name="newMobileNumber" placeholder="enter new mobile number"><br><br>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>

  </form>
</body>

