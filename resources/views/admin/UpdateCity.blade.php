@extends('admin.admin-panel')
@section('content')
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h1>name:</h1>

            <!-- One "tab" for each step in the form: -->




            <div class="tab">Arabic name:
            <p> <input type="text" placeholder="Arabic" oninput="this.className = ''" class="form-control file" name="name_ar"
                value="{{$city->city}}">
             </p>

            </div>
            <div class="tab">English name:
                <p> <input type="text" placeholder="English" oninput="this.className = ''" class="form-control file" name="name_en"
                    value="{{$city->city_en}}" >
                </p>

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
            </div>

            </form>
@endsection
