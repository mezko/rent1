@extends('admin.admin-panel')
@section('content')
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
              
                <td>{{$flat->f_id}}</td>
           
           <td>
            {{-- <input type="checkbox" class="form-check-input LCheckbox" id="exampleCheck1"> --}}
            <div class="form-check">
            <input type="checkbox" class="form-check-input LCheckbox"  id="exampleCheck1">
            </div>
            
           </td>
          



        </tr>

        </td>

        @endforeach
        <!--------model of message box of delete-->
        <!-- Modal -->



    </tbody>
  </table>

<script>
  $(document).ready(function () {

$('.LCheckbox').click(function () {
    $(this).next().next().prop('disabled', !this.checked)
    $('.LCheckbox').not(':checked').prop('disabled', $('.LCheckbox:checked').length == 3);
});
  });
</script>





@endsection
