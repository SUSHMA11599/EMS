<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class= "container">
    <h1>welcome to forgot password page</h1>
    <form action="update" method="POST">
    @csrf
 

    <div class="form-group">
        <label for="username">Enter Employee-ID:</label><br>
       
            <input type="text" name="username" placeholder="Enter emp_id"/> <br>
            <span style = "color:red">
                @error('username')
                {{$message}}
                @enderror
            </span>
            <br>


            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif

  
    </div>
    
    <div class="form-group"> 
        <label for="new_password">Enter new password:</label> <br>
    
            <input type="password" name="new_password" placeholder="Enter new password"/>  <br> 
    
            <span style = "color:red"> 
                @error('new_password')
                {{$message}}
                @enderror
            </span> <br> <br>
        
    
            <input type="password" name="confirm_password" placeholder="Confirm password"/> <br>
    
            <span style = "color:red"> 
                @error('confirm_password')
                {{$message}}
                @enderror
            </span>
     
    </div>
    <button class="btn btn-primary"type = "submit">click here to reset</button>
</form>
</div>


