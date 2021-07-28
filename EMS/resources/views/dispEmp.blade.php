
</form>
<table  id = "details" border="2" >
    
    <tr> 
        <th>Emp ID</th>
        <th>Mobile Number</th>
        <th>Date Of Birth</th>
        <th>Communication Address</th>
        <th>Gender</th>
        <th>City</th>   
        <th>Type of Employee</th>   
        </tr>
    
@foreach($emp as $user)
@if ($user->type_of_user != 'Admin')
        
         <tr>
         <td>{{ $user->emp_id }}</td>
         <td>{{ $user->phone_number }}</td>
         <td>{{ $user->DOB }}</td>
         <td>{{ $user->comm_address }}</td>
         <td>{{ $user->gender }}</td>
         <td>{{ $user->city }}</td>   
         <td>{{ $user->type_of_user }}</td>  
         </tr>
         @endif
         @endforeach 
</table>
