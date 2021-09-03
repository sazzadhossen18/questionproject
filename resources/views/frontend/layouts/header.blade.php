<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from templates.scriptsbundle.com/knowledge/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 04:58:33 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="ScriptsBundle">
	<title>Question & Answer Application</title>
	<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
	<link rel="icon" href="https://templates.scriptsbundle.com/knowledge/demo/images/favicon.ico" type="image/x-icon" />
	<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
	<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">
	<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
	<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
	<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
	<link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.min.css')}}">
	
	<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
	<link rel="stylesheet" href="{{asset('public/assets/css/et-line-fonts.css')}}">
	<!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
	<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/owl.style.css')}}">
	<!-- =-=-=-=-=-=-= Highliter Css =-=-=-=-=-=-= -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/styles/shCoreDefault.css')}}" />
    <!-- =-=-=-=-=-=-= Css Animation =-=-=-=-=-=-= -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/animate.min.css')}}" />
    <!-- =-=-=-=-=-=-= Hover Dropdown =-=-=-=-=-=-= -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/bootstrap-dropdownhover.min.css')}}" />
	<!-- JavaScripts -->

	<script src="{{asset('public/assets/js/modernizr.js')}}"></script>

	

	<style>
.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
    
    height: 40px;
    width: 40px;
}


.listing-grid .listing-meta span {
	text-transform: capitalize;
}


.answered p{
	border: 1px solid green;
	height: 70px;
	text-align: center;
	margin-top: 10px;
}


.unanswered p{
	border: none;
	height: 70px;
	text-align: center;
	margin-top: 10px;
}


.answered-accepted p{
	background-color: green;
	color: white;
	height: 70px;
	text-align: center;
	margin-top: 10px;
}


.author-image img{
	border-radius: 50%;
	width: 30px;
	height: 30px; 
	
}

.author-details h2{
	font-size: 15px;
}
.author-details p{
	font-size: 15px;
}

.votes-control p.votes-count{
	color:#495057;
}

.favorite p{
	margin-top: 10px;
}

.vote-answer-accept .accept-answer i{
		color:green;
}



</style>



</head>

<body>
	<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
	<div class="preloader"><span class="preloader-gif"></span>
	</div>
	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
	<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
				<ul class="top-nav nav-left">
					
					</li>
				</ul>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
				<ul class="top-nav nav-right">
					<li><a href="{{ route('login') }}"><i class="fa fa-lock" aria-hidden="true"></i>Login</a>
					</li>
					<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Signup</a>
					</li>
					<li class="dropdown">
					@if(auth::check()) 
						<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">
							<img class="img-circle resize" alt="" src="{{(!empty($user->image))?asset('public/upload/user_images/'.$user->image):asset('public/assets/image/user.png')}}">

							
							<span class="hidden-xs small-padding">
								<span>{{ Auth::user()->name }}</span>
							 <i class="fa fa-caret-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu ">
							<li><a href="{{route('user.profile')}}"><i class="fas fa-user"></i> Profile Setting</a></li>
							
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</ul>
						@endif
					 </li>
				</ul>
			</div>
		</div>
	</div>
</div>
	<!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
	<div class="navbar navbar-default">
		<div class="container">
			<!-- header -->
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">	<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- logo -->
				<a href="{{ url('/') }}" class="navbar-brand">
					<img class="img-responsive" alt="" src="{{asset('public/assets/image/logo.png')}}">
				</a>
				<!-- header end -->
			</div>
			<!-- navigation menu -->
			<div class="navbar-collapse collapse">
				<!-- right bar -->
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden-sm"><a href="{{route('how.work')}}">How  It Works</a>
					</li>
					
				
					<li>
						<div class="btn-nav"><a href="{{route('question.add')}}" class="btn btn-primary btn-small navbar-btn">Post Question</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- navigation menu end -->
			<!--/.navbar-collapse -->
		</div>
  </div>