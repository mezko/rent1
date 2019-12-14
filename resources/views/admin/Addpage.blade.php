@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf


        <!-- One "tab" for each step in the form: -->

        <div class="tab">
            @if ($ln=="ar")
            <h3>Arabic</h3>
            <textarea id="summernote"required class = "form-control" rows = "3" name="Page_ar"></textarea>
           <hr>
           @else
           <h3>Engleish</h3>
           <textarea id="summernote"required class = "form-control" rows = "3" name="page_en"></textarea>
          <hr>
            @endif

             <input type="submit">

        </div>



        <!-- Circles which indicates the steps of the form: -->


        </form>

@endsection
