@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>


        <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                @if ($user->premission==1)
                <td>admin</td> 
          
                    
                @elseif($user->premission==2)
                <td>offer writer</td>
                @else
                <td> Bloger</td>
             
                @endif
               
                <td>
                  <a href="/change/user/{{$user->id}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
           <td>

                {{-- <a href> --}}
                  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/Delete/user/{{$user->id}}">

                  
                            <i class="fas fa-trash-alt"></i>
                          
               </a>





        </td>
      </tr>
        @endforeach
        <!--------model of message box of delete-->
        <!-- Modal -->



    </tbody>
  </table>







@endsection
