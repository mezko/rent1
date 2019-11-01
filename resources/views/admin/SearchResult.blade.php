@extends('admin.admin-panel')
@section('content')
@if (count($flats)==0)
        <h1> No Search </h1>
 @else
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Address</th>
        <th scope="col">Type</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($flats as $flat)
        <tr>
                <th scope="row"><img src="/flat/{{$flat->img}}" alt="" height="50px" width="50px" ></th>
                <td>{{$flat->address}}, {{$flat->city}}</td>
                <td>{{$flat->type}}</td>
                <td> <a href="Edit/{{$flat->f_id}}"?>
                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
               </td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
            </tr>

        @endforeach
        <!--------model of message box of delete-->
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Flat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              You Will Delete This Flat
            </div>
            <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="deleteflat/{{$flat->f_id}}"> <button type="button" class="btn btn-primary">Delete</button>
             </a>
            </div>
          </div>
        </div>
      </div>


    </tbody>
  </table>
  @endif






@endsection
