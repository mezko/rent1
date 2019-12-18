@extends('admin.admin-panel')
@section('content')
<form id="regForm" action="" method="POST" enctype="multipart/form-data">
    @csrf
            <h4> Home Slider </h4>
            <div class="form-group">
              <label for="exampleInputEmail1">Arabic Slider </label>
              <input type="file" placeholder="Arabic" class="form-control" name="AR_slider" required>
             
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">English Slider </label>
                 <input type="file" placeholder="English" class="form-control" name="EN_slider"required>
                

                </div>
                 <button type="submit" class="btn btn-primary">Submit</button>

            </form>
@endsection
