@extends('MasterPage')
@section('content')
<div class="container">
   <!--::apartment_part end::-->
   <div class="apartment_part">
    <div class="container">
      <form method="POST">
         @csrf
         {{-- <h3> Fliter Your Flat </h3> --}}
             <div class="row  border rounded" style="border-width : 100px" >
               <div class="col-sm">
                  <div class="form-group">
                     <br>
                     @if (App::getLocale()=="en")
                      
                  <h5 >{{__('langu.name')}}</h5>
                  @else
                  <h5 class="text-right">{{__('langu.name')}}</h5>
                  @endif
                     <input type="text" class="form-control" name="name" >
                  </div>
               </div>


               <div class="col-sm">
                    
                     
                     <div class="form-group" style="margin-top: 10px">
                     <br>
                     <input type="text" class="js-range-slider" name="my_range" value=""
                     data-type="double"
                     data-min="0"
                     data-max="1000000"
                     data-from="0"
                     data-to="0"
                     data-grid="true"
                 />
               </div>
               </div>


               <div class="col-sm">
                     <div class="form-group">
                        <br>
                        @if (App::getLocale()=="en")
                         
                     <h5 >{{__('langu.city')}}</h5>
                     @else
                     <h5 class="text-right">{{__('langu.city')}}</h5>
                     @endif
                             <select class="form-control" id="exampleFormControlSelect1" name="city">
                              <option value="0">{{__('langu.all')}}</option>
                                 @foreach ($cities as $city)
                                  @if (App::getLocale()=="en")
                                  <!---langu =english-->
                                 <option value="{{$city->id}}">{{$city->city_en}}</option>
                                 @else
                                 <!---langu =arabic-->
                                 <option value="{{$city->id}}">{{$city->city}}</option>
                                 @endif
                                 @endforeach



                             </select>
                           </div>    
               </div>
               
               <div class="col-sm">
                  <div class="form-group">
                     <br>
                  @if (App::getLocale()=="en")
                  <h5>{{__('langu.Neighborhood')}}</h5>
                     @else
                     <h5 class="text-right">{{__('langu.Neighborhood')}}</h5>
                     @endif
              
                     <input type="text" class="form-control" name="neighborhood" >
                  </div>
               </div>


               <input type="submit"  value="{{__('langu.Submit')}}">
             </form> 
            
            </div>

              </div>

            <h4 class="border-bottom border-dark p-2"></h4>
                 <div class="col-lg-12 text-center my-2">
                 <h4 class="border-bottom border-dark p-2">{{__('langu.flats')}}</h4>
                </div>
       <div class="row">
   @foreach ($flats as $flat)

          <div class="col-md-4 col-lg-4">
             <div class="single_appartment_part">
                <div class="appartment_img">
                <img src="/flat/{{$flat->img}}" height="436px" width="100%" alt="">
                   <div class="single_appartment_text">
                      <h3>${{$flat->price}}</h3>
                       @if (App::getLocale()=="en")
                   <p><span class="ti-location-pin"></span>  {{$flat->city_en}}, {{$flat->dis_en}}</p>
                   @else
                   <p><span class="ti-location-pin"></span>{{$flat->city}},  {{$flat->dis_ar}}</p>
                   @endif
                   
                   </div>
                </div>
                <div class="single_appartment_content">
                   {{-- <a href="" class="love_us"> <span class="ti-heart"></span> </a> --}}
                   <p></p>
                   @if (App::getLocale()=="en")
                   <a href="/flatnum/{{$flat->f_id}}/{{App::getLocale()}}"><h4>{{$flat->en_name}}</h4></a>
                   @else
                   <a href="/flatnum/{{$flat->f_id}}/{{App::getLocale()}}"><h4>{{$flat->ar_name}}</h4></a>
                   @endif
                   {{-- <ul class="list-unstyled">
                      <li><a href=""><span class="flaticon-bath"></span></a> {{$flat->bath}}</li>
                      <li><a href=""><span class="flaticon-bed"></span></a> {{$flat->room}}</li>
                      <li><a href=""><span class="flaticon-frame"></span></a>  {{$flat->area}} sqft</li>
                   </ul> --}}
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
@endsection
