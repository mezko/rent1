@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf
        <h1>Flat:</h1>

        <!-- One "tab" for each step in the form: -->




        <div class="tab">city:
          <p><input placeholder="أسم الاعلان" oninput="this.className = ''" class="form-control" value="{{ old('ar_name') }}" name="ar_name" required></p>
          <p><input placeholder="English name" oninput="this.className = ''" class="form-control" value="{{ old('en_name') }}" name="en_name" required></p>
          <p>
          <select class="form-control" id="exampleFormControlSelect1" placeholder="city" oninput="this.className = ''" value="{{ old('city') }}" name="city" required>
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->city}}</option>
            @endforeach

          </select>
          </p>
          <p>
            <select name="distinics" value="{{ old('Distinic') }}" class="form-control custom-select" >
              <!-----------------here yalla-------------->     
              @foreach ($distinics as $distinic)
            <option value="{{$distinic->dis_id}}">{{$distinic->dis_ar}}</option> 
              @endforeach
              
                 
            </select>
      </p>

          {{-- <p><input placeholder="Distinic" required oninput="this.className = ''"class="form-control" value="{{ old('distinic') }}" name="distinic"></p> --}}
          {{-- <p><input placeholder="Address" required oninput="this.className = ''"class="form-control" value="{{ old('address') }}" name="address"></p> --}}
         <!-------------ar----------------------------->
          {{-- <p><input placeholder="الحى" required oninput="this.className = ''"class="form-control" value="{{ old('area_ar') }}"  name="area_ar"></p> --}}
          {{-- <p><input placeholder="العنوان" required oninput="this.className = ''"class="form-control"  value="{{ old('address_ar') }}" name="address_ar"></p> --}}

          <p><input type="number"  min="0" required placeholder="Price" oninput="this.className = ''"class="form-control" value="{{ old('Price') }}"    name="Price"></p>
        </div>

        <div class="tab">Distinic:
     
          <p><input type="file" value="{{ old('file') }}" placeholder="upload image" required oninput="this.className = ''" class="form-control" name="img"></p>
        </div>

        <div class="tab">Flat Information:
          <p><input type="text" min="0"  placeholder="Room" required oninput="this.className = ''"class="form-control" value="{{ old('room') }}" name="room"></p>
          <p><input type="number" min="0"  placeholder="Bath" required oninput="this.className = ''"class="form-control" value="{{ old('bath') }}" name="bath"></p>
          <p><input type="text" min="0"  placeholder="Area" required oninput="this.className = ''"class="form-control" value="{{ old('area') }}" name="area"></p>
          <p>
              <input type="checkbox" class="form-check-input" id="exampleCheck1"  name="vip" value="1">
               <label class="form-check-label" for="exampleCheck1">VIP</label>
         </p>
        </div>

        <div class="tab">info:
               <h6>Arabic</h6>
                <textarea id="summernote"required class = "form-control" rows = "3"  name="info_ar">
                  {{ old('info_ar') }}
                </textarea>
               <hr>
               <h6>English</h6>
               <textarea id="froala-editor"required  name="info">
                {{ old('info') }}
               </textarea>
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
