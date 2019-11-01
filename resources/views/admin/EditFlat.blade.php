@extends('admin.admin-panel')
@section('content')
<!----------------------------table of flat which need to update------------------------------>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Address</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                    <th scope="row"><img src="/flat/{{$flats->img}}" alt="" height="50px" width="50px" ></th>
                    <td>{{$flats->address}}, {{$flats->city}}</td>
                    <td>{{$flats->type}}</td>

            </td>
</tbody>
</table>
<!----------------------------End Of table of flat which need to update------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
<!----------------------------Form Of Update Flat------------------------------>
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h1>Edit Flat:</h1>

            <!-- One "tab" for each step in the form: -->
            <div class="tab">city:
              <p><input placeholder="city" oninput="this.className = ''" class="form-control" name="city" value="{{$flats->city}}"></p>
              <p><input placeholder="Area" oninput="this.className = ''"class="form-control" name="area"  value="{{$flats->area}}"></p>
              <p><input placeholder="Address" oninput="this.className = ''"class="form-control" name="address"  value="{{$flats->address}}"></p>
            </div>

            <div class="tab">type:
              <p>
                    <select name="type" class="form-control">
                            <option value="hire">Hire</option>
                            <option value="buy">buy</option>
                    </select>
              </p>
              <p><input type="file" placeholder="upload image" oninput="this.className = ''" class="form-control" name="img" ></p>
            </div>

            <div class="tab">Flat Information:
              <p><input placeholder="Room" oninput="this.className = ''"class="form-control" name="room"  value="{{$flats->room}}"></p>
              <p><input placeholder="Bath" oninput="this.className = ''"class="form-control" name="bath" value="{{$flats->bath}}"></p>
              <p><input placeholder="Area" oninput="this.className = ''"class="form-control" name="area"  value="{{nl2br($flats->area)}}"></p>
             <p> <input type="checkbox" class="form-check-input" id="exampleCheck1" name="vip" value="1">
               <label class="form-check-label" for="exampleCheck1">VIP</label>
             </p>
            </div>

            <div class="tab">Info:
              <p><textarea class = "form-control" rows = "3" placeholder="info" name="info"  value="{{$flats->info}}"></textarea></p>

            </div>

            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn" id="nextBtn" onclick="nextPrev(1)">Next</button>
              </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>

            </form>
@endsection

