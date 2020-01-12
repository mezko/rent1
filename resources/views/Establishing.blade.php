@extends('MasterPage')
@section('content')

<div class="apartment_part">
    <div class="container">
        <div class="row">    
        @if (App::getLocale()=="en")
        <p class="excert">
               @php
               echo nl2br($Establishing->p_en);
            @endphp
        </p>
        @else
        <p class="excert text-right">
               @php
               echo nl2br($Establishing->p_ar);
            @endphp
        </p>
        @endif
      </div>
    </div>
</div>
</div>
@endsection