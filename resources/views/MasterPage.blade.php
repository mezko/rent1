<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Real_state || Home</title>
   <link rel="icon" href="{{asset('img/favicon.png')}}">
   <!-- Bootstrap CSS -->

   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <!-- animate CSS -->
   <link rel="stylesheet" href="{{asset('css/animate.css')}}">
   <!-- owl carousel CSS -->
   <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
   <!-- themify CSS -->
   <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
   <!-- flaticon CSS -->
   <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
   <!-- magnific-popup CSS -->
   <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
   <!-- font awesome CSS -->
   <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/gallery.css')}}">
   <!-----------------------------------slider--------------------------->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>
   <!--bootstrap css-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="{{asset('css/slider/slider.css')}}">
   <!----------------------------gallery -------------------------------------------------------->
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------------------------lightbox---------------------------->
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
<!-------------------------------------------------------------------------------------->
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

   <!-- style CSS -->

   @if (App::getLocale()=="ar")
   <link rel="stylesheet" href="{{asset('css/ar.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">
   @else
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
   @endif
</head>

<body>
   <!--::menu part start::-->
   
   
             
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                  <!-- Search form -->
                  
                    <a class="navbar-brand" href="/index"  style="padding-left: 30px"> <img src="{{asset('img/logo.png')}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/index">{{ __('langu.Home') }}<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('langu.Our Services')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a  href="/Properties/{{App::getLocale()}}" class="dropdown-item" >{{ __('langu.Reception & Real Estate Tours')}}</a>
                                <a class="dropdown-item" href="/PropertiesVip/{{App::getLocale()}}">{{ __('langu.Property Consulting')}}</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('langu.Services')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="single-blog.html">{{ __('langu.Establishing companies')}}</a>
                                    <a class="dropdown-item" href="elements.html">{{ __('langu.Residence and nationality')}}</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="blog.html">{{ __('langu.News')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about.html">{{ __('langu.About US')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">{{ __('langu.Contact us')}}</a>
                            </li>
                        </ul>
                         
                        <form class="form-inline my-2 my-lg-0" method="POST">
                           @csrf
                           <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                         </form> 

                    </div>
                  

                    <div class="btn_1 d-none d-lg-block" style="margin-right: 30px">
      
                        @if (App::getLocale()=="ar")
                        
                    <a href="{{str_replace('ar', 'en', url()->current())}}" class="float-right"  >{{ __('langu.lang')}}</a>
                    @else
                    
                  
                    <a href="{{str_replace('en', 'ar', url()->current())}}" class="float-right" >{{ __('langu.lang')}}</a>
                    @endif
                </div>

                </nav>
                



   <!--::menu part end::-->

   <!--::banner part start::-->



        @yield('content')



   <!--::footer_part start::-->
   <footer class="footer_part">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
                <h4>About Us</h4>
                <p>Heaven fruitful doesn't over lesser days appear creeping seasons so behold bearing days open</p>
                <a href="index.html" class="footer_logo"> <img src="{{asset('img/footer_logo.png')}}" alt="#"> </a>
             </div>
          </div>
          <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
                <h4>Contact Info</h4>
                <p>Address :Your address goes
                   here, your demo address.</p>
                <p>Phone : +8880 44338899</p>
                <p>Email : info@colorlib.com</p>
             </div>
          </div>
          <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
                <h4>Important Link</h4>
                <ul class="list-unstyled">
                   <li><a href=""> WHMCS-bridge</a></li>
                   <li><a href="">Search Domain</a></li>
                   <li><a href="">My Account</a></li>
                   <li><a href="">Shopping Cart</a></li>
                   <li><a href="">Our Shop</a> Our Shop</li>
                </ul>
             </div>
          </div>
          <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
                <h4>Newsletter</h4>
                <p>Heaven fruitful doesn't over lesser in days. Appear creeping seasons deve behold bearing days open
                </p>
                <div class="mail_part">
                   <input type="text" placeholder="Email Address" class="placeholder hide-on-focus">
                   <a href="" class="email_icon"><i class="far fa-paper-plane"></i></a>
                </div>
             </div>
          </div>
       </div>
       <hr>
       <div class="row">
          <div class="col-sm-6 col-lg-6">
             {{-- <div class="copyright_text">
                <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
             </div> --}}
          </div>
          <div class="col-sm-6 col-lg-6">
             <div class="footer_icon">
                <ul class="list-unstyled">
                   <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                   <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                   <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                   <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!--::footer_part end::-->
 <!-- jquery plugins here-->
 <script src="{{asset('js/app.js')}}"></script>
<!--lightbox-->
 <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
 <!-- jquery -->
 <script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
 <!-- popper js -->
 <script src="{{asset('js/popper.min.js')}}"></script>
 <!-- bootstrap js -->
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
 <!-- easing js -->
 <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
 <!-- particles js -->
 <script src="{{asset('js/owl.carousel.min.js')}}"></script>
 <!-- easing js -->
 <script src="{{asset('js/jquery.easing.min.js')}}"></script>
 <!-- custom js -->



 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
               <!--End bootstrap js-->
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
     <script src="{{asset('js/slider/slider.js')}}"></script>


     <script src="{{asset('js/custom.js')}}"></script>
     <script src="{{asset('js/test.js')}}"></script>
     <script src="{{asset('js/gallery.js')}}"></script>
     <!------------------lightbox----------------->


     



</body>

</html>
