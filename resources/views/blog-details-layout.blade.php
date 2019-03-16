<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Callie HTML Template</title>

	<!-- Google font -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700')}}" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="index.html" class="logo"><img src="{{asset('/img/logo.png')}}" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form method="post" action="search-blog">
								{{ csrf_field() }}
								<input  type="input" class="input" name="search_text" placeholder="Enter your search...">
								<input type="submit" value="Search">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
				<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li class="">
							<a href="/">Home</a>
						</li>

                        <?php 
                         $result = DB::table('tbl_catagories')->where('catagory_ststus', 1)->get();
                        ?>
 @foreach($result as $all_result)
						<li class="">
							<a href="{{URL::to('catagory-blog/'.$all_result->catagory_id)}}">{{($all_result->catagory_name)}}</a>
							
						</li>
		
@endforeach
                        @guest
                        <li class="">
							<a href="{{URL::to('/login')}}">Login</a>
						</li>
						<li class="">
							<a href="{{URL::to('/register')}}">Register</a>
						</li>
						@else
               <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                     @endguest

					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="index.html">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">Health</a></li>
						</ul>
					</li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contacts</a></li>
					<li><a href="#">Advertise</a></li>
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>
	<!-- /HEADER -->

	<!-- SECTION -->
	
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
															</div>
						</div>
						<!-- post -->
						

						          @yield('content')
					
					</div>
					<!-- /row -->

					
					<!-- /row -->

				
					<!-- /row -->

			
					<!-- /row -->
				</div>
				<dLifestyleiv class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{asset('/img/ad-3.jpg')}}" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>

                        <?php 
                         $result = DB::table('tbl_catagories')->where('catagory_ststus', 1)->get();
                        ?>
						<div class="category-widget">
							<ul>
                              @foreach($result as $all_result)								
								<li><a href="{{URL::to('catagory-blog/'.$all_result->catagory_id)}}">{{($all_result->catagory_name)}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Recent  Posts</h2>
						</div>


                    <?php 
                 $popular_post = DB::table('tbl_blog')->where('publication_status',1)->orderBy('blog_id','desc')->limit(5)->get();

                    ?>
                    @foreach($popular_post as $v_popular_post)
						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="{{$v_popular_post->blog_id}}"><img src="{{asset($v_popular_post->blog_image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									
								</div>
								<h3 class="post-title"><a href="{{$v_popular_post->blog_id}}">{{$v_popular_post->blog_name}}</a></h3>
							</div>
						</div>
						<!-- /post -->

					@endforeach	
						

						
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>


                    <?php 
                 $popular_post = DB::table('tbl_blog')->where('publication_status',1)->orderBy('hit_counter','desc')->limit(5)->get();

                    ?>
                    @foreach($popular_post as $v_popular_post)
						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="{{URL::to('details-blog/'.$v_popular_post->blog_id)}}"><img src="{{asset($v_popular_post->blog_image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									
								</div>
								<h3 class="post-title"><a href="{{$v_popular_post->blog_id}}">{{$v_popular_post->blog_name}}</a></h3>
								<span>Total View {{$v_popular_post->hit_counter}}</span>
							</div>
						</div>
						<!-- /post -->

					@endforeach	
						

						
					</div>
					<!-- /post widget -->
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					
					<!-- /post widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
       
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ad -->
				<div class="col-md-12 section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="{{asset('/img/ad-2.jpg')}}" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	

	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="index.html" class="logo"><img src="{{asset('/img/logo-alt.png')}}" alt=""></a>
						</div>
						<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
						<ul class="contact-social">
							<li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
						<div class="category-widget">
							<ul>
								<li><a href="#">Lifestyle <span>451</span></a></li>
								<li><a href="#">Fashion <span>230</span></a></li>
								<li><a href="#">Technology <span>40</span></a></li>
								<li><a href="#">Travel <span>38</span></a></li>
								<li><a href="#">Health <span>24</span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								<li><a href="#">Social</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Life</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">Magazine</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Health</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Newsletter</h3>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
