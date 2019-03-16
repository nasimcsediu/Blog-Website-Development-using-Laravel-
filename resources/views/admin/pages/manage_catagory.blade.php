@extends('admin.master')
@section('admin_main_content')

        <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> Catagory manage Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> Catagory ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> Catagory Name</th>
                                        
                                        <th><i class=" icon-edit"></i> Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	
                                     @foreach($all_catagory_info as  $v_catagory)
                                    <tr>
                                        <td><a href="#">{{$v_catagory->catagory_id}}</a></td>
                                        <td class="hidden-phone">{{$v_catagory->catagory_name}}</td>
                                        
                                        <td>
                                         @if($v_catagory->catagory_ststus==1)
                                        	<span class="label label-success label-mini">{{'Publish'}}</span>
                                        @else($v_catagory->catagory_ststus==0)
                                       <span class="label label-important label-mini">{{'unpublish'}}</span>
                                       @endif
                                        </td>
                                        <td>
                                        	 
                                         <?php 

                                         if ($v_catagory->catagory_ststus==1)
                                         {

                                          ?>
                                         	                                                                      	
                                            <a href="{{('unpublish-catagory/'.$v_catagory->catagory_id)}}" class="btn btn-danger"><i class="icon-thumbs-down"></i></a>
                                        <?php }
                                        else{
                                        ?>
                                            <a href="{{('publish-catagory/'.$v_catagory->catagory_id)}}" class="btn btn-success"><i class="icon-thumbs-up"></i></a>

                                        <?php } ?>

                                            <a href="{{('edit-catagory/'.$v_catagory->catagory_id)}}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                            
                                            <a href="{{('delete-catagory/'.$v_catagory->catagory_id)}}" onclick="return checkDelete()" class="btn btn-danger"><i class="icon-trash "></i></a>


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

