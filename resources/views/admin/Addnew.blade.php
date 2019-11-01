@extends('admin.admin-panel')
@section('content')
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h3>Blog:</h3>

            <!-- One "tab" for each step in the form: -->


            <div class="tab">Image:
                    <p> <input type="file" placeholder="image" oninput="this.className = ''" class="form-control file" name="img">
                    </p>

                   </div>

            <div class="tab">Arabic Blog:
             <p> <input type="text" placeholder="heading_ar" oninput="this.className = ''" class="form-control file" name="heading_ar">
                <p><textarea class = "form-control" rows = "3" placeholder="info" name="p_ar"></textarea></p>

             </p>

            </div>
            <div class="tab">English Blog:
                    <p> <input type="text" placeholder="heading_en" oninput="this.className = ''" class="form-control file" name="heading_en">
                       <p><textarea class = "form-control" rows = "3" placeholder="info" name="p_en"></textarea></p>

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
              <span class="step"></span>
            </div>

            </form>
@endsection
