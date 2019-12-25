@extends('admin.admin-panel')
@section('content')
<!-- Horizontal Steppers -->
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
@csrf


        <!-- One "tab" for each step in the form: -->

        <div class="tab">
            <h3>The User Message :</h3>
            <div class="card">
                <div class="card-header">
                    @php
                    echo nl2br($messages->message);
                 @endphp
                </div>
            </div>
            <hr>
            
            <h3>Reply</h3>
            <textarea id="summernote"required class = "form-control" rows = "3" name="reply"></textarea>
           <hr>
         

             <input type="submit" id="sub">

        </div>



        <!-- Circles which indicates the steps of the form: -->


        </form>

@endsection
