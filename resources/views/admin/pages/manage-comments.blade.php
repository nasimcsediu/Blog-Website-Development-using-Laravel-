@extends('admin.master')
@section('admin_main_content')

        <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> Comments manage Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> Comments ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> Blog ID</th>
                                        
                                        <th><i class=" icon-edit"></i> Comments</th>
                                        <th>Publiation Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	
                                    
                                    @foreach($comments as $v_manage_comments) 
                                    <tr>
                                        <td>{{$v_manage_comments->comments_id}}</td>
                                        <td>{{$v_manage_comments->blog_id}}</td>
                                        <td>{{$v_manage_comments->comments}}</td>
                                        
                                        <td>
                                         @if($v_manage_comments->publication_status==1) 
                                        	<span class="label label-success label-mini">{{'Publish'}}</span>
                                       @else($v_manage_blog->publication_status==0)
                                       <span class="label label-important label-mini">{{'UnPublish'}}</span>
                                        </td>
                                        @endif
                                        <td>
                                        	 
                                       
                                         	 @if($v_manage_comments->publication_status==1)                                                                     	
                                            <a href="{{URL::to('unpublish-comments/'.$v_manage_comments->comments_id)}}" class="btn btn-danger"><i class="icon-thumbs-down"></i></a>
                                       
                                           @else($v_manage_blog->publication_status==0)
                                            <a href="{{URL::to('publish-comments/'.$v_manage_comments->comments_id)}}" class="btn btn-success"><i class="icon-thumbs-up"></i></a>

                                        @endif
                                           

                      
                                            
                                            <a href="{{'delete-comments/'.$v_manage_comments->comments_id}}" onclick="return checkDelete()" class="btn btn-danger"><i class="icon-trash "></i></a>


                                        </td>
                                    </tr>

                                    @endforeach
                                    
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>



@endsection

