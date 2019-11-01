@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Arabic</th>
        <th scope="col">English</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($cities as $city)
        <tr>


        <th scope="row">{{$city->city}}</th>
                <td>{{$city->city_en}}</td>
                <td><a href="Upload/city/{{$city->id}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
           <td>

                <a href="/delet/city/{{$city->id}}">
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
