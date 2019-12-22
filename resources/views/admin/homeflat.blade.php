@extends('admin.admin-panel')
@section('content')
<form method="POST">
  @csrf
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">flat</th>
        
        <th scope="col">home</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($flats as $flat)
        <tr>


        <th scope="row">{{$flat->f_id}}</th>
              
                <td><img src="/flat/{{$flat->img}}" alt="" height="50px" width="50px"></td>
           
           <td>
            {{-- <input type="checkbox" class="form-check-input LCheckbox" id="exampleCheck1"> --}}
            <div class="form-check">
              @if ($flat->home_state==1)
              <input type="checkbox" class="form-check-input LCheckbox" value="{{$flat->f_id}}" id="exampleCheck1" name="home[]" checked>
 
              @else
              <input type="checkbox" class="form-check-input LCheckbox" value="{{$flat->f_id}}" id="exampleCheck1" name="home[]" >

              @endif
         
          </div>
            
           </td>
          



        </tr>

        </td>

        @endforeach
        <!--------model of message box of delete-->
        <!-- Modal -->



    </tbody>
  </table>
  
  {{-- {{ $flats->links() }} --}}
    <button type="submit" class="btn btn-primary   btn-block">Submit</button>
  </form> 
  






@endsection
