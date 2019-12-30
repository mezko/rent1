@extends('MasterPage')
@section('content')

   <!--::banner part start::-->

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
       @for ($i = 0; $i < $count_homesliders; $i++)
       @if ($i==0)

                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
       @else
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
       @endif
       @endfor
    </ol>
    <div class="carousel-inner">
       @for ($i = 0; $i < $count_homesliders; $i++)
       <!--active carouser-------------------------------->
       @if ($i==0)
       <div class="carousel-item active">
          <!--Arabic Slider-------------------------------->
         @if (App::getLocale()=="ar")
         <img class="d-block w-100" src="{{asset('/homepic/'.$homesliders[$i]->AR_slider)}}" height="650px" alt="First slide">
         @else 
           <!--English Slider-------------------------------->
         <img class="d-block w-100" src="{{asset('/homepic/'.$homesliders[$i]->EN_Slider)}}" height="650px" alt="First slide">
          @endif   
       </div>
       @else

      <!--other carouser-------------------------------->
       <div class="carousel-item">
         <!--Arabic Slider-------------------------------->
         @if (App::getLocale()=="ar")
         <img class="d-block w-100" src="{{asset('/homepic/'.$homesliders[$i]->AR_slider)}}" height="650px" alt="First slide">
         @else
         <!--English Slider-------------------------------->
         <img class="d-block w-100" src="{{asset('/homepic/'.$homesliders[$i]->EN_Slider)}}" height="650px" alt="First slide">
         @endif
         </div>
       @endif
       
       @endfor
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

   <!--::apartment_part end::-->
   <div class="container">
    <!--::apartment_part end::-->
    <div class="apartment_part">
     <div class="container">
         <form method="POST" action="/Properties">
             @csrf
            
                 <div class="row  border rounded" style="border-width : 100px" >

            
                   <div class="col-sm">

                         <br>
                         <div class="form-group">

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
                                 <label for="exampleFormControlSelect1">City:</label>

                                 <select class="form-control" id="exampleFormControlSelect1" name="city">
                                     @foreach ($cities as $city)
                                     <option value="{{$city->id}}">{{$city->city_en}}</option>
                                     @endforeach



                                 </select>
                               </div>

                   </div>
                   <input type="submit">
                 </form>
                 </div>

               </div>

             <h4 class="border-bottom border-dark p-2"></h4>
                  <div class="col-lg-12 text-center my-2">
                  <h2 class="border-bottom border-dark p-2">{{__('langu.flats')}}</h2>
                 </div>
        <div class="row">
    @foreach ($flats as $flat)

           <div class="col-md-4 col-lg-4">
              <div class="single_appartment_part">
                 <div class="appartment_img">
                  <img src="/flat/{{$flat->img}}" height="436px" width="100%" alt="" >
                  <div class="single_appartment_text">
                       <h3>${{$flat->price}}</h3>
         
                       @if (App::getLocale()=="en")
                       <p><span class="ti-location-pin"></span> {{$flat->city_en}} , {{$flat->dis_en}}</p>
                       @else
                       <p><span class="ti-location-pin"></span> {{$flat->city}}, {{$flat->dis_ar}}</p>
                       @endif

                    </div>
                 </div>
                 <div class="single_appartment_content">
                    {{-- <a href="" class="love_us"> <span class="ti-heart"></span> </a> --}}
                    
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
    <br>
    <br>
  <div class="col">
  
   <div class="container">


      <div class="row justify-content-center">
      
       
            <a href="/Properties/{{App::getlocale()}}" class="btn-lg">{{__('langu.more')}}</a>
            
      
      </div>
   </div>


   </div>

 </div>
 </div>
 </div>
<div class="col-12" style="height: 150px;">
    <input type="hidden">
</div>
   <!--::apartment_part end::-->

   <div class="passion_part">

    <div class="container">
       <div class="row">
          <div class="col-lg-5">
             <div class="section_tittle">
                @if (App::getlocale()=="ar")
                   <h1 class="text-right">
                  {{__('langu.Services')}}
                   </h1>
                   @else
                   <h1 class="text-left">
                     {{__('langu.Services')}}
                      </h1>
                   @endif
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon"> <i class="flaticon-compass"></i> </a>
                <h4>{{__('langu.Our Services')}}</h4>
                   <p>Hac facilisi ac vitae consec tetu commod vel magna suspen disse on senectus
                      pharetra magnfauc bed</p>
                   <a href="/Properties/{{App::getlocale()}}" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
                </div>
             </div>
          </div>
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon"> <i class="flaticon-desk"></i> </a>
                   <h4>{{__('langu.Establishing companies')}}</h4>
                   <p>Hac facilisi ac vitae consec tetu commod vel magna suspen disse on senectus
                      pharetra magnfauc bed</p>
                   <a href="/Establish company/{{App::getlocale()}}" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
                </div>
             </div>
          </div>
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon"> <i class="flaticon-beach"></i> </a>
                   <h4>{{__('langu.Residence and nationality')}}</h4>
                   <p>Hac facilisi ac vitae consec tetu commod vel magna suspen disse on senectus
                      pharetra magnfauc bed</p>
                   <a href="/residences/{{App::getlocale()}}" class="btn_2">Read More <span class="ti-arrow-right"></span></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!--::passion_part end::-->

   <!--::room_part end::-->


   <!--::cta_part start::-->
   <div class="cta_part">
      <div class="container">


         <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="cta_iner">
                  <h1>Are You Ready For Move? </h1>
                  <p>Lights had saw moving saw female blessed</p>
               <a href="/Contact US/{{App::getlocale()}}" class="cta_btn">{{__('langu.Contact us')}}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--::cta_part end::-->

   <!--::blog_part start::-->
   <div class="blog_part">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="section_tittle">
               <h1>{{__('langu.Blog')}}</h1>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-6 col-lg-7">
               <div class="single_blog">
                  <div class="appartment_img">
                     <img src="/news pic/{{$blog->img}}"     alt="">
                  </div>
                  <div class="single_appartment_content">

                     <a href="/Blog/{{$blog->id}}/{{App::getLocale()}}">
                     <h4>{{$blog->heading_en}}</h4>
                     </a>

                  </div>
               </div>
               </div>
               



            <div class="col-md-6 col-lg-5">
               <div class="right_single_blog">
                    @foreach ($blogs as $blog)
                  <div class="single_blog">
                     <div class="media">
                        <img    src="/news pic/{{$blog->img}}"  width="195" height="182"    class=" mr-3 " alt="...">
                        <div class="media-body align-self-center">
                           <p><a href="#">blog</a></p>
                        <a href="/Blog/{{$blog->id}}/{{App::getLocale()}}">
                                @if (App::getLocale()=="en")
                              <h5 class="mt-0 ">{{$blog->heading_en}}</h5>
                              @else
                              <h5 class="mt-0 text-right ">{{$blog->heading_ar}}</h5>
                              @endif
                           </a>

                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--::blog_part end::-->

   @endsection
