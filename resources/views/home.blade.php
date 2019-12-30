@extends('admin.admin-panel')
@section('content')
<!----------------css files of info box------------------------------------------------------------>
<link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/alt/AdminLTE-bootstrap-social.min.css" rel="stylesheet">

<div class="container">
        <div class="row">
            @if (Auth::user()->premission==1)
                <div class="info-box col-sm" >
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon " style="background-color: white ;color: #0f4d81"><i class="fas fa-user fas-2x"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{$users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      
                      &nbsp
                      @endif
                      <!----------------second div------------>
                      @if (Auth::user()->premission==1 or Auth::user()->premission==2)
                      <div class="info-box col-sm">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon " style="background-color: #0f4d81 ;color: white"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Projects</span>
                            <span class="info-box-number">{{$flat}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          @endif
                                 &nbsp
                      <!----------------second div------------>
                      @if (Auth::user()->premission==1 or Auth::user()->premission==3 )
                          
                      
                      <div class="info-box col-sm">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon " style="background-color: white ;color: #0f4d81"><i class="far fa-newspaper"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Blogs</span>
                              <span class="info-box-number">{{$blog}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          @endif
        </div>
</div>
@endsection
