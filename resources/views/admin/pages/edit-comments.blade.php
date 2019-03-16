@extends('blog-details-layout')
@section('content')
<form class="post-reply" method="post" action="{{URL::to('/update-comment')}}">
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

									
								</div>
								
								
								<div class="col-md-12">
									<button class="primary-button">Post Your Comment</button>
								</div>

							</div>
						</form>
						@endsection