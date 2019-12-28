@extends('MasterPage')
@section('content')

<div class="apartment_part">
<div class="container">
<div class="row">
 <h1>
    {{__('langu.ourblogs')}}
 </h1>
</div>
<div class="row">
    @foreach ($blogs as $blog)
        
    
    <div class="col-sm-12 col-xs-12  col-md-4  card">
        <div class="card-body">
         <div class="row">
            <img src="/news pic/{{$blog->img}}" height="200px" width="100%" alt="" srcset="">
        </div>
          <a href="/Blog/{{$blog->id}}/{{App::getLocale()}}">
            @if (App::getLocale()=="en")
               <h3 class="text-center">{{$blog->heading_en}}</h3>
            @else
                 <h3 class="text-center">{{$blog->heading_ar}}</h3>
            @endif
          </a>
        </div>
    </div>
   
    @endforeach
    
  
        
    
    

</div>
</div>
</div>




</div>






    
@endsection
