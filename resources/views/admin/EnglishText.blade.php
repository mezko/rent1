@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf


        <!-- One "tab" for each step in the form: -->

        <div class="tab">
         
            <p>
                English info:
      </p>
     
           <h3>English</h3>
        
           <textarea id="summernote"required class = "form-control" rows = "3" name="info"></textarea>
          
           </textarea>
      
          
          <hr>
             <input type="submit" id="sub">

        </div>



        <!-- Circles which indicates the steps of the form: -->


        </form>

@endsection
