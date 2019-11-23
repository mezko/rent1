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
                <!------------city--------------->
                 <p>   <select class="form-control" id="exampleFormControlSelect1" placeholder="city" oninput="this.className = ''" name="city" required>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach

                          </select>
                          </p>

                         <p><input placeholder="Area" oninput="this.className = ''"class="form-control" name="distinic"  value="{{$flats->distinic}}"></p>
              <p><input placeholder="Address" oninput="this.className = ''"class="form-control" name="address"  value="{{$flats->address}}"></p>
             <!-------------ar----------------------------->
          <p><input placeholder="الحى" required oninput="this.className = ''"class="form-control" name="area_ar"  value="{{$flats->area_ar}}"></p>
          <p><input placeholder="العنوان" required oninput="this.className = ''"class="form-control" name="address_ar"  value="{{$flats->address_ar}}"></p>
          <p><input type="number"  min="0" required placeholder="Price" oninput="this.className = ''"class="form-control" name="Price" value="{{$flats->price}}"></p>

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
              <p><input placeholder="Area" oninput="this.className = ''"class="form-control" name="area"  value="{{$flats->area}}"></p>

             <p> <input type="checkbox" class="form-check-input" id="exampleCheck1" name="vip" value="1">
               <label class="form-check-label" for="exampleCheck1">VIP</label>
             </p>
            </div>

            <div class="tab">Info:
                <h6>Arabic</h6>
                <textarea id="summernote"required class = "form-control" rows = "3" placeholder="info_ar" name="info_ar">
                        {{$flats->info_ar}}
                </textarea>
               <hr>
               <h6>English</h6>
               <textarea id="froala-editor"required name="info">
                    {{$flats->info}}
               </textarea>
                <input type="submit">
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

