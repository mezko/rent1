@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Reply</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
        <th scope="row">{{$message->id}}</th>
        <!-----------username----------------->
                <td>{{$message->username}}</td>
                <td>{{$message->email}}</td>
                <!--------reply button--->
                <td>  
                  <a class="btn btn-primary"  href="/replymessage/{{$message->id}}">
                  <i class="fas fa-comment-dots"></i>
                   </a>
</td>

        @endforeach
        
      </div>


    </tbody>
  </table>







@endsection
