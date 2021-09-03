@extends('frontend.layouts.layout')
@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>How It Works</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
               
                <li class="active">How It Work</li>
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

    <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
    <section id="blog" class="custom-padding white">
      <div class="container">
        <!-- Row -->

        <div class="row">
          <div class="col-sm-4 col-md-4 col-xs-12  center-responsive"> <img src="{{asset('public/assets/image/step1.png')}}" class="img-responsive" alt="">
            <h4>Create An Account</h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="{{asset('public/assets/image/step2.png')}}" class="img-responsive" alt="">
            <h4>Post Your Question</h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="{{asset('public/assets/image/step3.png')}}" class="img-responsive" alt="">
            <h4>Find Your Solution</h4>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->
    
    
    <!-- =-=-=-=-=-=-= Download App =-=-=-=-=-=-= -->
		<div class="parallex section-padding  our-apps text-center">
			<div class="container">
				<!-- title-section -->
				<div class="main-heading text-center">
					<h2>Download Our Apps</h2>
					<hr class="main">
				</div>
				<!-- End title-section -->
				<div class="row">
					<div class="app-content">
						<!-- Single download start \-->
						<div class="col-md-4 col-sm-4">
							<a href="#" class="app-grid"> <span class="app-icon"> <img alt="#" src="{{asset('public/assets/image/mobile.png')}}"> </span>
								<div class="app-title">
									<h5>Available on the</h5>
									<h3>iOS App Store</h3>
								</div>
							</a>
						</div>
						<!--/ Single download end-->
						<!-- Single download start \-->
						<div class="col-md-4 col-sm-4">
							<a href="#" class="app-grid"> <span class="app-icon"> <img alt="#" src="{{asset('public/assets/image/play-store.png')}}"> </span>
								<div class="app-title">
									<h5>Available on the</h5>
									<h3>Google Store</h3>
								</div>
							</a>
						</div>
						<!--/ Single download end-->
						<!-- Single download start \-->
						<div class="col-md-4  col-sm-4">
							<a href="#" class="app-grid"> <span class="app-icon"> <img alt="#" src="{{asset('public/assets/image/windows.png')}}"> </span>
								<div class="app-title">
									<h5>Available on the</h5>
									<h3>Windows Store</h3>
								</div>
							</a>
						</div>
						<!--/ Single download end-->
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- end container -->
		</div>
		<!-- =-=-=-=-=-=-= Download App END =-=-=-=-=-=-= -->

    

  </div>

@endsection