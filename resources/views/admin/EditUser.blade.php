@extends('admin.admin-panel')
@section('content')
<!---table which show the data of user-->
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>


      </tr>
    </thead>
    <tbody>
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
               
      
      </tr>
        
        <!--------model of message box of delete-->
        <!-- Modal -->



    </tbody>
  </table>
<!--end table-->

<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h1>Add User:</h1>

            <!-- One "tab" for each step in the form: -->




            <div class="tab">Fill The Form:
                <hr>
         
             <p>
                <!--------------------------------------------------------------------------->
                <input type="text" placeholder="name" value="{{$user->name}}" class="form-control file" name="name">
             </p>
             <!--email--------->
             
             <p>
                <!---------------------------------------------------------------------->
                <input type="text" placeholder="email"  value="{{$user->email}}" class="form-control file" name="email">
             </p>
             <!---password-->
            
             <p>
                <!---------------------------------------------------------------->
                <input type="password"   class="form-control file" name="password">
             </p>
             <!--confirm password-->
             <p> <input type="password"   class="form-control file" name="password_confirmation">
             </p>
             <!----------premission------->
             <p>
                 <select name="premission"   class="form-control file">
                     <!-----Admin---->
                     <option value="1">
                          Admin
                     </option>
                       <!-----offers writer---->
                       <option value="2">
                           offers writer
                       </option>
                         <!-----bloge writer---->
                     <option value="3">
                            bloge writer
                       </option>
                 </select>
             </p>


            </div>
       <input type="submit">






            </form>
@endsection
