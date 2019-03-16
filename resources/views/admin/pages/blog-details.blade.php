@extends('blog-details-layout')
@section('content')
 
        <div class="section-row">
        		          <figure class="pull-right">
							<img src="{{asset($blog->blog_image)}}" width="300px" height="200px" alt="">
							<figcaption></figcaption>
						</figure>
						<h3><?php echo $blog->blog_name ?></h3>
						<p><?php echo $blog->blog_short_description?></p>
                        <br><br>


						<p><?php echo $blog->blog_long_description?></p>
					
                          @guest
                        <div class="section-title">
							<h3 class="title">You Need to <a href="{{ URL::to('login') }}"> Login </a>for Comment</h3>
						</div>
                        @else

                        <h3 align="center" style="color:green">
       <?php 
        $message = Session::get('message');
        if ($message) {
        	echo $message;
        	Session::put ('message','');
        }
       ?>
   </h3>
						<div class="section-title">
							<h3 class="title">Leave a reply</h3>
						</div>

							<form class="post-reply" method="post" action="{{URL::to('/save-comment')}}">
								{{ csrf_field() }}
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" placeholder="Message" name="comments"></textarea>
									</div>
								</div>
								<div class="col-md-4">
									

                                 <div class="form-group">
										<input class="hidden" type="text" value="{{Auth::user()->id}}" placeholder="Name" name="id" required="">
									</div>

									<div class="form-group">
										<input class="hidden" type="text" value="{{($blog->blog_id)}}" placeholder="Name" name="blog_id" required="">
									</div>
                               
								</div>
								
								
								<div class="col-md-12">
									<button class="primary-button">Post Your Comment</button>
								</div>

							</div>
						</form>
						@endguest

					</div>



@endsection