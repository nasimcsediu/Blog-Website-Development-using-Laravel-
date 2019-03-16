@extends('admin.master')
@section('admin_main_content')


                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Blog Add Form </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <h3 align="center" style="color: green">
                        	 <?php 
                                $messages=Session::get('messages');
                                if ($messages) {
                                   	echo $messages;
                                   	Session::put('messages','');
                                   }   
                        	  ?>
                        </h3>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <!-- {!! Form::open(['url' => 'save-blog','method'=>'POST','files'=>true]) !!} -->
                            <form method="POST" action="save-blog" enctype="multipart/form-data" name="edit-blog">
                                {{ (csrf_field() )}}
                            <div class="control-group">
                                <label class="control-label">Blog Title</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="blog_name" value="{{$all_blog->blog_name}}" />
                                     
                                </div>
                            </div>
                           
                          <div class="control-group">
                                <label class="control-label">Catagory Name</label>
                                <div class="controls">
                                   <select name="catagory_id">
                                      @foreach($result as $v_catagory) 
                                       <option value="{{($v_catagory->catagory_id)}}">{{($v_catagory->catagory_name)}}</option>
                                       @endforeach
                                   </select>
                                    
                                </div>
                            </div>

                               <div class="control-group">
                                <label class="control-label">Post Image</label>
                                <div class="controls">
                                  <input type="file" name="blog_image">
                                  <span><img src="{{asset($all_blog->blog_image)}}" width="50px" height="50px" alt="test"></span>
                                    
                                </div>
                            </div>

                            
                            <div class="control-group">
                                <label class="control-label">Blog Short Description</label>
                                <div class="controls">
                                    <textarea class="span6" name="blog_short_description" rows="3">{{$all_blog->blog_short_description}}</textarea>
                                </div>
                            </div>

                             <div class="control-group">
                                <label class="control-label">Blog Long Description</label>
                                <div class="controls">
                                    <textarea class="span6" name="blog_long_description" rows="3">{{$all_blog->blog_long_description}}</textarea>
                                </div>
                            </div>
                            
                            
                          
                           
                          
                            <div class="control-group">
                                <label class="control-label">Publish Status</label>
                                <div class="controls">
                                    <select class="span6 " name="publication_status" value="{{$all_blog->publication_status}}">
                                        
                                        <option value="1">Publish</option>
                                        <option value=" 0">Unpublish</option>
                                    </select>
                                </div>
                            </div>
                            
                         
                            
                            

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Add Blog</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <script type="text/javascript">
                    	document.forms['edit-blog'].elements['catagory_id'].value='<?php echo $all_blog->catagory_id ?>';

                    	document.forms['edit-blog'].elements['publication_status'].value='<?php echo $all_blog->publication_status ?>';
                    </script>

@endsection