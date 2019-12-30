@extends('MasterPage')
@section('content')
<div class="container">
    <!------ Include the above in your HEAD tag ---------->
        <div class="apartment_part">
    
<div class="row">
    <div class="container">
        <div class="container-fluid">
            @if(Session::has('success-message'))
            <div class="alert alert-success">
                <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                {!! session()->get('success-message') !!}
            </div>
        @endif
        @if (Session::has('delete-message'))
        <div class="alert alert-danger">
            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true">&times;</button>
            {!! session()->get('delete-message') !!}
        </div>


        @endif
        
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        @if (App::getlocale()=="ar")
        <form method="POST" id="regform" class="text-right" >
        @else
        <form method="POST" id="regform" class="text-left" >
        @endif
            @csrf 
            <div class="form-group">
            <p class="h5">{{__('langu.YourName')}}</p>
                <input type="text" name="username"class="form-control" >
            </div>
            <div class="form-group">
                <p class="h5">{{__('langu.YourEmail')}}</p>
                <input type="text" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <p class="h5">{{__('langu.YourMessage')}}</h4>
          
                <textarea class="form-control" name="message" rows="8px"></textarea>
            </div>
        <input type="submit" class="btn btn-block btn-light" value="{{__('langu.submit')}}">
        </form>
         </div>
        </div>
     </div>
 </div>
</div>
<br>
@endsection