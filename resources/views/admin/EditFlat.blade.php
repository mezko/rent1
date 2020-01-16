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
                    <td>{{$flats->en_name}}</td>
                    <td>{{$flats->dis_en}} , {{$flats->city_en}}</td>

            </td>
</tbody>
</table>
<!----------------------------End Of table of flat which need to update------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
<!----------------------------Form Of Update Flat------------------------------>
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
  @csrf
          <h1>Flat:</h1>
  
          <!-- One "tab" for each step in the form: -->
  
  
  
  
          <div class="tab">
            <p><input placeholder="أسم الاعلان" oninput="this.className = ''" class="form-control" value="{{$flats->ar_name }}" name="ar_name" required></p>
            <p><input placeholder="English name" oninput="this.className = ''" class="form-control" value="{{$flats-> en_name }}" name="en_name" required></p>
            <p>
            <select class="form-control" id="exampleFormControlSelect1" placeholder="city" oninput="this.className = ''" value="{{$flats->  city }}" name="city" required>
              @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->city}}</option>
              @endforeach
  
            </select>
            </p>
            <p>
              <select name="distinics" value="{{$flats->dis_en }}" class="form-control custom-select" >
                <!-----------------here yalla-------------->     
                @foreach ($distinics as $distinic)
              <option value="{{$distinic->dis_id}}">{{$distinic->dis_ar}}</option> 
                @endforeach
                
                   
              </select>
        </p>
  
            {{-- <p><input placeholder="Distinic" required oninput="this.className = ''"class="form-control" value="{{$flats->  distinic }}" name="distinic"></p> --}}
            {{-- <p><input placeholder="Address" required oninput="this.className = ''"class="form-control" value="{{$flats-> address }}" name="address"></p> --}}
           <!-------------ar----------------------------->
            {{-- <p><input placeholder="الحى" required oninput="this.className = ''"class="form-control" value="{{$flats->  area_ar }}"  name="area_ar"></p> --}}
            {{-- <p><input placeholder="العنوان" required oninput="this.className = ''"class="form-control"  value="{{$flats->  address_ar }}" name="address_ar"></p> --}}
  
            <p><input type="number"  min="0" required placeholder="Price" oninput="this.className = ''"class="form-control" value="{{$flats->price }}"    name="Price"></p>
          </div>
  
          <div class="tab">Distinic:
       
            <p><input type="file" value="{{$flats->img }}" placeholder="upload image" required oninput="this.className = ''" class="form-control" name="img"></p>
          </div>
  
          <div class="tab">Flat Information:
            <p><input type="text" min="0"  placeholder="Room" required oninput="this.className = ''"class="form-control" value="{{$flats->  room }}" name="room"></p>
            <p><input type="number" min="0"  placeholder="Bath" required oninput="this.className = ''"class="form-control" value="{{$flats->  bath }}" name="bath"></p>
            <p><input type="text" min="0"  placeholder="Area" required oninput="this.className = ''"class="form-control" value="{{$flats->  area }}" name="area"></p>
            <p>
                <input type="checkbox" class="form-check-input" id="exampleCheck1"  name="vip" value="1">
                 <label class="form-check-label" for="exampleCheck1">VIP</label>
           </p>
          </div>
  
          <div class="tab">info:
                 <h6>Arabic</h6>
                  <textarea id="summernote"required class = "form-control" rows = "3"  name="info_ar">
                    {{$flats->  info_ar }}
                  </textarea>
                 <hr>
               
                  <input type="submit" id="sub">
  
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
  