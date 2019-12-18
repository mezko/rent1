@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Slider</th>
        <th scope="col">Slider English</th>
        <th scope="col">Slider Arabic</th>
        {{-- <th scope="col">Edit</th> --}}
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($homesliders as $homeslider)
        <tr>


        <th scope="row">{{$homeslider->id}}</th>

                <td><img src="{{asset('/homepic/'.$homeslider->AR_slider)}}" width="25%" class="src"></td>
                <td>
                  <img src="{{asset('/homepic/'.$homeslider->EN_Slider)}}" width="25%" class="src"></td>
               
                {{-- <td>
                  <a href="/EditHomeSliderPage/{{$homeslider->id}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                  </td> --}}
           <td>

                {{-- <a href> --}}
                  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/DeleteSlider/{{$homeslider->id}}">

                  
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
