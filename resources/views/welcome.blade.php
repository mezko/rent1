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
     <form method="POST" action="/Properties/{{App::getlocale()}}">
         @csrf
         {{-- <h3> Fliter Your Flat </h3> --}}
             <div class="row  border rounded" style="border-width : 100px" >
               <div class="col-sm">
                  <div class="form-group">
                     <br>
                     @if (App::getLocale()=="en")
                      
                  <h5 style="font-weight: bold;" >{{__('langu.name')}}</h5>
                  @else
                  <h5 style="font-weight: bold;" class="text-right">{{__('langu.name')}}</h5>
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
                         
                     <h5 style="font-weight: bold;">{{__('langu.city')}}</h5>
                     @else
                     <h5 style="font-weight: bold;" class="text-right">{{__('langu.city')}}</h5>
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
                  <h5 style="font-weight: bold;">{{__('langu.Neighborhood')}}</h5>
                     @else
                     <h5 style="font-weight: bold;" class="text-right" style="font-weight: bold;">{{__('langu.Neighborhood')}}</h5>
                     @endif
              
                     <input type="text" class="form-control" name="neighborhood" >
                  </div>
               </div>


               <input type="submit"  value="{{__('langu.Submit')}}" class="subbtn">
             </form>

                 </div>

               </div>

             <h4 class="border-bottom border-dark p-2"></h4>
                  <div class="col-lg-12 text-center my-2">
                  <h2 class="border-bottom border-dark p-2" style="font-weight: bold;">{{__('langu.flats')}}</h2>
                 </div>
        <div class="row">
    @foreach ($flats as $flat)

           <div class="col-md-4 col-lg-4" style="margin-bottom: 10px;">
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

                    <ul class="list-unstyled">
                     <li>
                        @if ($flat->vip==1)
                     <span class="badge badge-primary">{{__('langu.Property Consulting')}}</span>
                        @else
                        <span class="badge badge-primary">{{__('langu.Reception & Real Estate Tours')}}</span>
                        @endif
                        
                     </li>
                   </ul> 

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
      
       
            <a href="/Properties/{{App::getlocale()}}" onMouseOver="this.style.color='#0f4d81'" class="btn-lg">{{__('langu.more')}}</a>
            
      
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
              
                   <h1 >
                     {{__('langu.Services')}}
                      </h1>
                   
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon" style="padding-top: 8px">  <i class="fas fa-home"></i> </a>
                <h4>{{__('langu.Our Services')}}</h4>
              
                <p>{{__('langu.box1')}}</p>
                <br>
                <br>
                @if (App::getlocale()=="en")
                   <a href="/Properties/{{App::getlocale()}}"  class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-right"></span></a>
                @else
                <a href="/Properties/{{App::getlocale()}}" class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-left"></span></a>

                @endif
               </div>
             </div>
          </div>
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon"> <i class="flaticon-desk"></i> </a>
                   <h4>{{__('langu.Establishing companies')}}</h4>
                <p style="font-size: 19px">{{__('langu.box2')}}</p>
                @if (App::getlocale()=="en")
                   <a href="/Establish company/{{App::getlocale()}}" class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-right"></span></a>
                 @else
                 <a href="/Establish company/{{App::getlocale()}}" class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-left"></span></a>

                 @endif
                
                  </div>
             </div>
          </div>
          <div class="col-sm">
             <div class="single_passion">
                <div class="single_passion_item">
                   <a href="#" class="passion_icon" style="padding-top:9px">
                       {{-- <i class="flaticon-beach"></i> --}}
                       <i class="fas fa-star-and-crescent" ></i>
                       
                       
                      </a>
                   <h4>{{__('langu.Residence and nationality')}}</h4>
                     <p>{{__('langu.box3')}}</p>
                     @if (App::getlocale()=="en")
                     <a href="/residences/{{App::getlocale()}}" class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-right"></span></a>
                     @else
                     <a href="/residences/{{App::getlocale()}}" class="btn_2">{{__('langu.Read More')}} <span class="ti-arrow-left"></span></a>
 
                     @endif
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
                  <h1>{{__('langu.contactus1')}} </h1>
                  <p style="font-size: 18px; font-family: cairo">{{__('langu.contactus2')}}</p>
               <a href="/Contact US/{{App::getlocale()}}" class="cta_btn" style="font-weight: bold; font-size: 18px">
                  {{__('langu.Contact us')}}
               </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--::cta_part end::-->

   <!--::blog_part start::-->
   <br>
   <div class="container">
      <div class="row">
       <h1 style="font-weight: bold">
          {{__('langu.ourblogs')}}
       </h1>
      </div>
      <br>
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
      <br>
      <div class="col">
  
         <div class="container">
      
      
            <div class="row justify-content-center">
            
             
                  <a href="/ourblogs/{{App::getlocale()}}" onMouseOver="this.style.color='#0f4d81'" class="btn-lg" id="BlogButton">{{__('langu.more')}}</a>
                  
            
            </div>
         </div>
      
      
      
      
      
      
      
      
      
      

         
               </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <br>
   <!--::blog_part end::-->

   @endsection
