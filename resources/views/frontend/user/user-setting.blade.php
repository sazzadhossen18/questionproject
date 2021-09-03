@extends('frontend.layouts.layout')
@section('content')
<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 col-xs-12 text-left">
            <h1>{{ $user->name }}</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 col-xs-12 text-right">
          	  @if(Session::has('flash_message_error')) 
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   

        @if(Session::has('flash_message_success')) 
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif 
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
            
                <li class="active">Profile</li>
              </ol>
            </div>
            <!-- end bread -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>

    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= User Profile =-=-=-=-=-=-= -->
    <section id="user-profile" class="user-profile parallex">
      <div class="container">
        <!-- Row -->
        <div class="row">

          <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="profile-sec ">
              <div class="profile-head">
                <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                 
                  <div class="profile-avatar">
                    <span>
                    	<img class="img-responsive img-circle" alt="image" src="{{(!empty($user->image))?asset('public/upload/user_images/'.$user->image):asset('assets/image/user.png')}}" style="height: 100px; width: 100px;">


                    </span>
                    <div class="profile-name">
                      <h3>{{ $user->name }}</h3>
                    </div>
                  </div>



                </div>
               
              </div>
            </div>
            <!-- Profile Sec -->
          </div>

        </div>
        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>

    <!-- =-=-=-=-=-=-= User Profile end =-=-=-=-=-=-= -->
    
 <!-- =-=-=-=-=-=-= User Form Settings =-=-=-=-=-=-= -->
    <section class="section-padding-80" id="login">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">

            <div class="box-panel">

             <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                 @csrf
                <div class="form-group">
                  <label>Upload Image</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="image" name="image">
                </span>
                    </span>
                    <input type="text" class="form-control" readonly="">
                  </div>
                  <img id="img-upload" src="{{(!empty($user->image))?asset('upload/user_images/'.$user->image):asset('assets/image/user.png')}}" alt="">
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Change Image</button>

              </form>

            </div>
          </div>

          <div class="col-md-8">

            <div class="box-panel">

              <!-- form login -->
              <form method="post" action="{{route('profiles.password.update')}}" id="myForm">
                 @csrf

                <div class="form-group">
                  <label>User Name</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email"  placeholder="Your Email" class="form-control">
                </div>
                <div class="form-group ">
                      <label for="current_password">Current Password</label>
                      <input type="password" name="current_password" id="current_password" class="form-control">
                  </div>

                <div class="form-group">
                  <label> New Password</label>
                  <input type="password" name="new_password" placeholder="Your New Password" id="new_password" class="form-control">
          
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" placeholder="Your Confirm Password" class="form-control">
                </div>
               

                <button class="btn btn-primary btn-lg" type="submit">Update My Profile</button>

              </form>
              <!-- form login -->

            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>
 <!-- =-=-=-=-=-=-= User Form Settings End =-=-=-=-=-=-= -->
 
    

  </div>


@endsection
