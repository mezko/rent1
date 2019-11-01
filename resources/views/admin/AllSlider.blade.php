@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Image</th>
        <th scope="col">Cat</th>

        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($slider as $slide)
        <tr>

                <td>{{$slide->id}}</td>
                <th scope="row"><img src="/upload pic/{{$slide->name}}" alt="" height="50px" width="50px" ></th>
                <td>{{$slide->catagory}}</td>
           <td>
                <a href="/delet/slide/{{$slide->id}}">
                    <button type="button" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
               </a>



        </tr>

        </td>

        @endforeach
        <!--------model of message box of delete-->
        <!-- Modal -->



    </tbody>
  </table>







@endsection
