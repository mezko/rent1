@extends('MasterPage')
@section('content')

<div class="container">
<!------ Include the above in your HEAD tag ---------->
    <div class="apartment_part">


        <div class="container">
                <div class="row">


                                      <img  class="mx-auto d-block" alt="Responsive image" src="/flat/{{$flat->img}}"  alt="" style="width:320px; height 320px;">

                   <div class="col-lg-12 text-center my-2">
                      <h4 class="border-bottom border-dark p-2">Isotope filter magical layouts with Bootstrap 4</h4>
                   </div>
                </div>
                <div class="portfolio-menu mt-2 mb-4">
                   <ul>
                      <li class="btn btn-outline-dark active" data-filter="*">All</li>
                      <li class="btn btn-outline-dark" data-filter=".3">Engineering Buliding</li>
                      <li class="btn btn-outline-dark" data-filter=".2">Outside</li>
                      <li class="btn btn-outline-dark text" data-filter=".1">Inside</li>
                   </ul>
                </div>
                <div class="portfolio-item row">

                @foreach ($sliders as $slider)
<!---->
                <div class="item {{$slider->catagory}} col-lg-3 col-md-4 col-6 col-sm">
                        <a href="/upload pic/{{$slider->name}}" class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid" src="/upload pic/{{$slider->name}}"alt="">
                        </a>
                     </div>

                @endforeach



             </div>
            </div>
             <h4 class="border-bottom border-dark p-2"></h4>
             <!-------------------------------------------Data Of Flat --------------------------------------->
             <div class="col-lg-12 text-center my-2">
                    <h4 class="border-bottom border-dark p-2">Flat</h4>
                 </div>
             <!----------------------------------------------------table Which Have The Data ------------------------------------------->
             <table class="table">
                    <thead class="thead-dark">
                      <tr>

                        <th scope="col">Details</th>
                        <th scope="col">Details</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td><i class="fas fa-city"></i> City</td>
                        <td>{{$flat->city}}</td>

                      </tr>
                      <tr>

                            <td><span class="flaticon-bath"> &nbsp  Bath </span></td>
                            <td>{{$flat->bath}}</td>

                          </tr>

                    </tbody>
                  </table>


</div>
<!------------------------------------------------ new Dev ----------------------------------------->
<h4 class="border-bottom border-dark p-2"></h4>
<!-------------------------------------------Data Of Flat --------------------------------------->
<div class="col-lg-12 text-center my-2">
       <h4 class="border-bottom border-dark p-2">Plus Information</h4>
    </div>
<!----------------------------------------------------table Which Have The Data ------------------------------------------->
<div class="blog_details">
        <h2>Extra Information About The Flat
        </h2>

        <p class="excert">
                <h3>
        @php
            echo nl2br($flat->info);
         @endphp
                </h3>
        </p>



     </div>
  </div>
</div>

@endsection
































