@extends('admin.admin-panel')
@section('content')
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h1>Flat:</h1>

            <!-- One "tab" for each step in the form: -->




            <div class="tab">city:
                <p>
                    <select name="type" class="form-control">
                            <option value="1">inside</option>
                            <option value="2">outside</option>
                            <option value="3">Engineering</option>
                    </select>
              </p>

            </div>

            <div class="tab">type:

              <p><input type="file" placeholder="upload image" oninput="this.className = ''" class="form-control file" name="img[]" multiple></p>
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
            </div>

            </form>
@endsection
