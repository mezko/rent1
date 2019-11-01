@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
            <th scope="col">Image</th>
        <th scope="col">Arabic Heading</th>
        <th scope="col">English Heading</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>

                <th scope="row"><img src="/news pic/{{$blog->img}}" alt="" height="50px" width="50px" ></th>
        <th scope="row">{{$blog->heading_ar}}</th>
                <td>{{$blog->heading_en}}</td>
                <td><a href="/edit/blog/{{$blog->id}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
           <td>

                <a href="/delet/blog/{{$blog->id}}">
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
