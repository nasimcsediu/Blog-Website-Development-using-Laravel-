@extends('blog-details-layout')
@section('content')
      
      
						   
                       @foreach($search_blog as $all_result)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{URL::to('details-blog/'.$all_result->blog_id)}}"><img src="{{asset($all_result->blog_image)}}" width="300px" height="200px"></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$all_result->catagory_id}}</a>
									</div>
									<h3 class="post-title"><a href="{{URL::to('details-blog/'.$all_result->blog_id)}}">{{$all_result->blog_name}}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$all_result->blog_author}}</a></li>
										<li>{{$all_result->created_at}}</li>
									</ul>
								</div>
							</div>
						</div>
                       @endforeach

@endsection