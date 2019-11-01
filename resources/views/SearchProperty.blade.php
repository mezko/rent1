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

                  <div class="col-sm" >
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type:</label>

                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                          <option>Hire</option>
                          <option>Buy</option>

                        </select>
                      </div>
                  </div>
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
                    <h4 class="border-bottom border-dark p-2">flats</h4>
                </div>
       <div class="row">
   @foreach ($flats as $flat)

          <div class="col-md-4 col-lg-4">
             <div class="single_appartment_part">
                <div class="appartment_img">
                <img src="/flat/{{$flat->img}}" alt="" >
                   <div class="single_appartment_text">
                      <h3>${{$flat->price}}</h3>
                   <p><span class="ti-location-pin"></span>{{$flat->address}}</p>
                   </div>
                </div>
                <div class="single_appartment_content">
                   {{-- <a href="" class="love_us"> <span class="ti-heart"></span> </a> --}}
                   <p>Home, {{$flat->type}}</p>
                   <a href="flatnum/{{$flat->f_id}}"><h4>{{$flat->en_name}}</h4></a>
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
@endsection
