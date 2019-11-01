@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf
        <h1>Flat:</h1>

        <!-- One "tab" for each step in the form: -->




        <div class="tab">city:
          <p><input placeholder="أسم الاعلان" oninput="this.className = ''" class="form-control" name="ar_name"></p>
          <p><input placeholder="English name" oninput="this.className = ''" class="form-control" name="en_name"></p>
          <p>
          <select class="form-control" id="exampleFormControlSelect1" placeholder="city" oninput="this.className = ''" name="city">
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->city}}</option>
            @endforeach

          </select>
          </p>

          <p><input placeholder="Area" oninput="this.className = ''"class="form-control" name="area"></p>
          <p><input placeholder="Address" oninput="this.className = ''"class="form-control" name="address"></p>
          <p><input type="number" placeholder="Price" oninput="this.className = ''"class="form-control" name="Price"></p>
        </div>

        <div class="tab">type:
          <p>
                <select name="type" class="form-control">
                        <option value="Hire">Hire</option>
                        <option value="Buy">Buy</option>
                </select>
          </p>
          <p><input type="file" placeholder="upload image" oninput="this.className = ''" class="form-control" name="img"></p>
        </div>

        <div class="tab">Flat Information:
          <p><input type="number" placeholder="Room" oninput="this.className = ''"class="form-control" name="room"></p>
          <p><input type="number" placeholder="Bath" oninput="this.className = ''"class="form-control" name="bath"></p>
          <p><input type="number" placeholder="Area" oninput="this.className = ''"class="form-control" name="area"></p>
          <p>
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="vip" value="1">
               <label class="form-check-label" for="exampleCheck1">VIP</label>
         </p>
        </div>

        <div class="tab">Info:
          <p><textarea class = "form-control" rows = "3" placeholder="info" name="info"></textarea></p>

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
