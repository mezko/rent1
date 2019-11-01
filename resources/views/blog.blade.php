@extends('MasterPage')
@section('content')

<div class="apartment_part">

<!--::breadcrumb part start::-->
<!--================Blog Area =================-->

        <div class="text-center">

        <img   src="/news pic/{{$blogs->img}}" alt="">

        </div>

<div class="container">
        <div class="row">
          <div class="blog_details" style="width:1600px">
             <!--------------------------Heading------------------------->
                @if (App::getLocale()=="en")
             <h2>{{$blogs->heading_en}}
             </h2>
             @else
             <h2 class="text-right">{{$blogs->heading_ar}}
                </h2>
                @endif
                <!-------------------------------------- paragraph ------------------------->
                @if (App::getLocale()=="en")
             <p class="excert ">
                    @php
                    echo nl2br($blogs->p_en);
                 @endphp
             </p>
             @else
             <p class="excert text-right">
                    @php
                    echo nl2br($blogs->p_ar);
                 @endphp
             </p>
             @endif
          </div>
       </div>

          </div>

       </div>
    </div>



@endsection
