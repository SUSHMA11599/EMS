<table border="1">
    <tr>
    <th>employee id</th>
    <th>project id</th>
    <th>manager id</th>
    <th>manager name</th>
     <th>project name</th>
     <th>project description</th>
    </tr>
     <tr>
     @foreach($proj as $user)
         <tr>
         <td>{{ $user->emp_id }}</td>
         <td>{{ $user->project_id }}</td>
         <td>{{ $user->manager_id}}</td>
         <td>{{ $user->first_name}}</td>
         <td>{{ $user->project_name }}</td>
         <td>{{ $user->project_desc }}</td>
         </tr>
         @endforeach 
</table>
     </tr>
</table>
