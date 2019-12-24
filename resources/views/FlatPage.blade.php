@extends('MasterPage')
@section('content')

<div class="container">
<!------ Include the above in your HEAD tag ---------->
    <div class="apartment_part">


        <div class="container">
                <div class="row">


                                      <img  class="mx-auto d-block" alt="Responsive image" src="/flat/{{$flat->img}}"  alt="" style="width:320px; height 320px;">

                   <div class="col-lg-12 text-center my-2">
                        @if (App::getLocale()=="en")
                   <h4 class="border-bottom border-dark p-2">{{$flat->en_name}}</h4>
                   @else
                   <h4 class="border-bottom border-dark p-2">{{$flat->ar_name}}</h4>
                   @endif
                   <h4><i class="fas fa-dollar-sign "></i>{{$flat->price}}</h4>


                   </div>

                </div>
                <div class="portfolio-menu mt-2 mb-4">
                   <ul>
                        @if (App::getLocale()=="en")
                      <li class="btn btn-outline-dark active" data-filter="*">All</li>
                      <li class="btn btn-outline-dark" data-filter=".3">Engineering Buliding</li>
                      <li class="btn btn-outline-dark" data-filter=".2">Outside</li>
                      <li class="btn btn-outline-dark text" data-filter=".1">Inside</li>
                      @else
                      <li class="btn btn-outline-dark active" data-filter="*">الكل</li>
                      <li class="btn btn-outline-dark" data-filter=".3">التصميم الهندسى</li>
                      <li class="btn btn-outline-dark" data-filter=".2">من الخارج</li>
                      <li class="btn btn-outline-dark text" data-filter=".1">من الداخل</li>
                      @endif

                   </ul>
                </div>
                <div class="portfolio-item row">

                @foreach ($sliders as $slider)
<!---->
                <div class="item {{$slider->catagory}} col-lg-3 col-md-4 col-6 col-sm">
                  
                           <a href="/upload pic/{{$slider->name}}" class="image-link example-image-link" data-lightbox="example-1" >
                        <img class="image-popup-vertical-fit"  src="/upload pic/{{$slider->name}}"alt="">
                        </a>
                 
                                             
                            {{-- <a class="example-image-link" href="/upload pic/{{$slider->name}}" >
                              <img  src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" /></a> --}}
                    
                </div>
                @endforeach



             </div>
            </div>
             <h4 class="border-bottom border-dark p-2"></h4>
             <!-------------------------------------------Data Of Flat --------------------------------------->
             <div class="col-lg-12 text-center my-2">
               @if (App::getLocale()=="en")
                    <h4 class="border-bottom border-dark p-2">Flat</h4>
                    @else
                    <h4 class="border-bottom border-dark p-2">مشروع</h4>
                    @endif
                 </div>
             <!----------------------------------------------------table Which Have The Data ------------------------------------------->
             <table class="table">
                    <thead class="thead-dark">
                      <tr>
                            @if (App::getLocale()=="en")
                        <th scope="col">Details</th>
                        <th scope="col">Details</th>
                        <th scope="col">Details</th>
                        <th scope="col">Details</th>
                        @else
                        <th scope="col">التفاصيل</th>
                        <th scope="col">التفاصيل</th>
                        <th scope="col">التفاصيل</th>
                        <th scope="col">التفاصيل</th>
                        @endif

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                            @if (App::getLocale()=="en")
                            <td><i class="fas fa-city"></i> </td>
                            <td>{{$city->city_en}}</td>
                        <td><i class="fas fa-city"></i> </td>
                        <td>{{$flat->distinic}}</td>

                     @else
                        <td><i class="fas fa-city"></i> </td>
                        <td>{{$city->city}}</td>
                        <td><i class="fas fa-city"></i> </td>
                        <td>{{$flat->area_ar}}</td>
                        @endif


                      </tr>
                      <tr>
                            @if (App::getLocale()=="en")
                            <td><span class="fas fa-city"></span></td>
                            <td>{{$flat->address}}</td>
                            <td><span class="flaticon-frame"> </span></td>
                            <td>{{$flat->area}}</td>
                            @else
                            <td><span class="fas fa-city"></span></td>
                            <td>{{$flat->address_ar}}</td>
                            <td><span class="flaticon-frame"> </span></td>
                            <td>{{$flat->area}}</td>

                            @endif




                          </tr>


                          <tr>
                                @if (App::getLocale()=="en")
                                <td><span class="flaticon-bed"> </span></td>
                                <td><span>{{$flat->room}}</span></td>
                                <td><span class="flaticon-bath"> </span></td>
                                <td><span>{{$flat->bath}}</span></td>
                                @else
                                <td><span>{{$flat->room}}</span></td>
                                <td><span class="flaticon-bed"> </span></td>
                                <td><span>{{$flat->bath}}</span></td>
                                <td><span class="flaticon-bath"> </span></td>

                                @endif

                              </tr>



                    </tbody>
                  </table>



</div>

<!------------------------------------------------ new Dev ----------------------------------------->
<h4 class="border-bottom border-dark p-2"></h4>
<!-------------------------------------------Data Of Flat --------------------------------------->
<div class="col-lg-12 text-center my-2">
   @if (App::getLocale()=="en")
       <h4 class="border-bottom border-dark p-2">Plus Information</h4>
       @else
       <h4 class="border-bottom border-dark p-2">معلومات اضافية</h4>

      @endif 
      </div>
<!----------------------------------------------------table Which Have The Data ------------------------------------------->
<div class="blog_details">
        <h2>Extra Information About The Flat
        </h2>

        <p class="excert">
                <h3>
                        @if (App::getLocale()=="en")
        @php
            echo nl2br($flat->info);
         @endphp
         @else
         @php
         echo nl2br($flat->info_ar);
      @endphp

         @endif
                </h3>
        </p>



     </div>
  </div>
</div>

@endsection
































