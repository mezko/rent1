@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf


        <!-- One "tab" for each step in the form: -->

        <div class="tab">
         
            <p>
                English Blog:
      </p>
       <p> <input type="text" placeholder="heading_en"  class="form-control file" name="heading_en">
       </p>
           <h3>English</h3>
           <textarea id="summernote"required class = "form-control" rows = "3" name="p_en"></textarea>
          <hr>
             <input type="submit" id="sub">

        </div>



        <!-- Circles which indicates the steps of the form: -->


        </form>

@endsection
