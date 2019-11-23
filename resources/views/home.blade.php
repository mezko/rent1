@extends('admin.admin-panel')
@section('content')
<!----------------css files of info box------------------------------------------------------------>
<link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/alt/AdminLTE-bootstrap-social.min.css" rel="stylesheet">

<div class="container">
        <div class="row">
                <div class="info-box col-sm" >
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon " style="background-color: white ;color: #CFB579"><i class="fas fa-user fas-2x"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Users</span>
                          <span class="info-box-number">93,139</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      &nbsp
                      <!----------------second div------------>
                      <div class="info-box col-sm">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon " style="background-color: #CFB579 ;color: white"><i class="fas fa-user fas-2x"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Users</span>
                              <span class="info-box-number">93,139</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                                 &nbsp
                      <!----------------second div------------>
                      <div class="info-box col-sm">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon " style="background-color: white ;color: #CFB579"><i class="fas fa-user fas-2x"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Users</span>
                              <span class="info-box-number">93,139</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
        </div>
</div>
@endsection
