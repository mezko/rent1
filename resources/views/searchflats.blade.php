@extends('MasterPage')
@section('content')
<div class="container">
   <!--::apartment_part end::-->
   <div class="apartment_part">
    <div class="container">
        <form method="POST">
            @csrf
            <h3> Fliter Your Flat </h3>
                <div class="row  border rounded" style="border-width : 100px" >
                  <div class="col-sm">
                     <div class="form-group">
                        <br>
                        @if (App::getLocale()=="en")
                        <h5>{{__('langu.city')}}:</h5>

                        @else
                       
                        <h5 class="text-right">{{__('langu.city')}}:</h5>

                        @endif
                        <div class="input-group">
                           <input type="text" class="form-control" name="name" >
                        </div>
                       
                      
                  </div>
                  </div>


                  <div class="col-sm">
                        <div class="form-group">
                           <br>
                           @if (App::getLocale()=="en")
                           <h5>{{__('langu.location')}}:</h5>
                           @else
                           <h5 class="text-right">{{__('langu.location')}}:</h5>
   
                           @endif
                                <select class="form-control" id="exampleFormControlSelect1" name="dis">
                                <option value="0">{{__('langu.all')}}</option>
                                    @foreach ($distinics as $distinic)
                                    @if (App::getLocale()=="en")
                                    <option value="{{$distinic->dis_id}}">{{$distinic->dis_en}}</option>
                                    @else
                                    <option value="{{$distinic->dis_id}}">{{$distinic->dis_ar}}</option>
                                    @endif
                                    
                                    @endforeach



                                </select>
                              </div>

                  </div>
               <input type="submit" value="{{__('langu.submit')}}">
                </form>
                </div>

              </div>
 
              @if (Session::has('delete-message'))
        <div class="alert alert-danger">
            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true">&times;</button>
            {!! session()->get('delete-message') !!}
        </div>
</div>
</div>


      
                  
              @else
                  
       




            <h4 class="border-bottom border-dark p-2"></h4>
                 <div class="col-lg-12 text-center my-2">
                 <h4 class="border-bottom border-dark p-2">{{__('langu.flats')}}</h4>
                </div>
       <div class="row">
   @foreach ($flats as $flat)

          <div class="col-md-4 col-lg-4">
             <div class="single_appartment_part">
                <div class="appartment_img">
                <img src="/flat/{{$flat->img}}" alt="" >
                   <div class="single_appartment_text">
                      <h3>${{$flat->price}}</h3>
                   <p><span class="ti-location-pin"></span> {{$flat->city_en}}</p>
                   </div>
                </div>
                <div class="single_appartment_content">
                   {{-- <a href="" class="love_us"> <span class="ti-heart"></span> </a> --}}
                   <p>Home</p>
                   @if (App::getLocale()=="en")
                   <a href="/flatnum/{{$flat->f_id}}/{{App::getLocale()}}"><h4>{{$flat->en_name}}</h4></a>
                   @else
                   <a href="/flatnum/{{$flat->f_id}}/{{App::getLocale()}}"><h4>{{$flat->ar_name}}</h4></a>
                   @endif
               
                   <ul class="list-unstyled">
                      <li><a href=""><span class="flaticon-bath"></span></a> {{$flat->bath}}</li>
                      <li><a href=""><span class="flaticon-bed"></span></a> {{$flat->room}}</li>
                      <li><a href=""><span class="flaticon-frame"></span></a>  {{$flat->area}} sqft</li>
                   </ul>
                </div>
             </div>
             </div>

 @endforeach
</div>
</div>
</div>

<style>
    .border-3 {
    border-width:15px !important;
}
    </style>
 <!--::apartment_part end::-->
 @endif

@endsection
