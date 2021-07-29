<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container" class="col-lg-3">
    <h1>welcome to Login page</h1>
    <h3 style="color: black;">SIGN-IN AND SIGN-UP HERE</h3>
    <br>

    <form action="{{route('login-user')}}" method="GET">

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{session::get('fail')}}</div>
        @endif

        @csrf
        <div class="form-group">
            <label for="">Enter Employee Id</label><br>
            <input type="number" class="form-control" name="username" placeholder="Enter Employee-Id">

            <span style="color:red">
                @error('username')
                {{$message}}
                @enderror
            </span>

        </div>
        <div class="form-group">
            <label for="">Enter Password</label><br>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">

            <span style="color:red">
                @error('password')
                {{$message}}
                @enderror
            </span>
        </div>
        <a href="forgotPass">forgot Password</a><br>
        <span>New User!!!
            <a href="register">Register HERE</a><br>
        </span>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>


</div>