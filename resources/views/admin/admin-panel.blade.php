<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rent</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!---------------summer note----->

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
      <div class="sidebar-brand-text mx-3">Admin:{{Auth::user()->name}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
<!--Add flat-->
    @if(Auth::user()->premission==1 or Auth::user()->premission==2)
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">

            <i class="fas fa-building"></i>
          <span>projects</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="/Allflats">All projects</a>
            <a class="collapse-item" href="/add/flat">Add project </a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-globe-americas"></i>
          <span>Cities</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" href="buttons.html">Cities:</h6>
            <a class="collapse-item" href="/all_cities">All Cities</a>
            <a class="collapse-item" href="/city">Add City</a>
          </div>
        </div>
      </li>
      @endif

      @if(Auth::user()->premission==1 or Auth::user()->premission==3)
      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-globe-americas"></i>
              <span>Blogs</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" href="buttons.html">Messages:</h6>
                <a class="collapse-item" href="/All/blog">Not Replied Messages</a>
                <a class="collapse-item" href="/Add/blog">Replied Messages</a>
              </div>
            </div>
          </li>
          @endif

          @if(Auth::user()->premission==1)
  
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedis" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-globe-americas"></i>
              <span>distinics</span>
            </a>
            <div id="collapsedis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" href="buttons.html">distinics:</h6>
                <a class="collapse-item" href="/all_distinics">All distinics</a>
                <a class="collapse-item" href="/dis">Add City</a>
              </div>
            </div>
          </li>




      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsfour" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
              <span>Users</span>
            </a>
            <div id="collapsfour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" href="buttons.html">Blogs:</h6>
                <a class="collapse-item" href="/All/user">All Users</a>
                <a class="collapse-item" href="/Add/user">Add users</a>
              </div>
            </div>
          </li>
          <!--------home slider------->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsfive" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-images"></i>
              <span>Home Slider</span>
            </a>
            <div id="collapsfive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" href="buttons.html">Sliders:</h6>
                <a class="collapse-item" href="/homeslider">All Sliders</a>
                <a class="collapse-item" href="/AddHomeSliderPage">Add Slider</a>
              </div>
            </div>
          </li>
          <!-----------------------pages--------------------------------------------->
          <li class="nav-item">
            <a class="nav-link collapsed" href="/pages">
                    <i class="fas fa-sticky-note"></i>
              <span>Pages</span>
            </a>
          </li>
            <!-----------------------Home Flat--------------------------------------------->
            <li class="nav-item">
              <a class="nav-link collapsed" href="/ShowHomeFlat" >
                      <i class="fas fa-building"></i>
                <span>HomeFlat</span>
              </a>
            </li>
            <!-----------------------messages---------------------->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapssex" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fas fa-comment-dots"></i>
                <span>Messages</span>
              </a>
              <div id="collapssex" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header" href="buttons.html">Messages:</h6>
                  <a class="collapse-item" href="/messages">Replied Messages</a>
                  <a class="collapse-item" href="/Add/user">Not Replied Messages</a>
                </div>
              </div>
            </li>
        
          @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          {{-- <form class="form-inline md-form mr-auto mb-4" method="POST" action="Searchfor">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">

            <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>

          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <!-- Nav Item - Alerts -->






            <div class="topbar-divider d-none d-sm-block"></div>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                {{-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> --}}
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @if(Session::has('success-message'))
            <div class="alert alert-success">
                <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                {!! session()->get('success-message') !!}
            </div>
        @endif
        @if (Session::has('delete-message'))
        <div class="alert alert-danger">
            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true">&times;</button>
            {!! session()->get('delete-message') !!}
        </div>


        @endif
        
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        @yield('content')



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->


  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
      </script>



  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <!---flat script-->
<script>
  $('div.alert').delay(5000).slideUp(300);

  </script>
  <script>
 var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  }
else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
      </script>
  <script>
    new FroalaEditor('textarea#froala-editor')
    new FroalaEditor('.selector', {
imageUploadMethod: 'PUT'
});
  </script>
    <script type="text/javascript">
   
      $('#regForm').submit(function(){
          $("#sub", this)
            .html("Please Wait...")
            .attr('disabled', 'disabled');
          return true;
      });
         
      </script>
      <script>
        // Create a lightbox
     (function() {
       var $lightbox = $("<div class='lightbox'></div>");
       var $img = $("<img>");
       var $caption = $("<p class='caption'></p>");
     
       // Add image and caption to lightbox
     
       $lightbox
         .append($img)
         .append($caption);
     
       // Add lighbox to document
     
       $('body').append($lightbox);
     
       $('.lightbox-gallery img').click(function(e) {
         e.preventDefault();
     
         // Get image link and description
         var src = $(this).attr("data-image-hd");
         var cap = $(this).attr("alt");
     
         // Add data to lighbox
     
         $img.attr('src', src);
         $caption.text(cap);
     
         // Show lightbox
     
         $lightbox.fadeIn('fast');
     
         $lightbox.click(function() {
           $lightbox.fadeOut('fast');
         });
       });
     
     }());
        </script>


</body>
<style>
/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}
/***************logo of text area*/
#logo {
    display: none;
    float: left;
    outline: none;
}
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}


    </style>

</html>
