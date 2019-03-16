@extends('admin.master')
@section('admin_main_content')


                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Catagori Add Form </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <h3 align="center" style="color: green">
                        	 <?php 
                                $message=Session::get('message');
                                if ($message) {
                                   	echo $message;
                                   	Session::put('message','');
                                   }   
                        	  ?>
                        </h3>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            {!! Form::open(['url' => 'save-catagory','method'=>'POST']) !!}
                            <div class="control-group">
                                <label class="control-label">Catagorie Name</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="catagory_name" value="{{($catagory_manage_info->catagory_name)}}" />
                                    
                                </div>
                            </div>
                           
                          

                            
                            <div class="control-group">
                                <label class="control-label">Catagorie Description</label>
                                <div class="controls">
                                    <textarea class="span6" name="catagory_description" rows="3">{{($catagory_manage_info->catagory_description)}}</textarea>
                                </div>
                            </div>
                            
                            
                          
                             <div class="control-group">
                                <label class="control-label">Publish Status</label>
                                <div class="controls">
                                    <select class="span6 " name="catagory_ststus" data-placeholder="Choose a Category" tabindex="1">
                                        
                                        <option value=" 1">Publish</option>
                                        <option value=" 0">Unpublish</option>
                                    </select>
                                </div>
                            </div>
                          
                            
                
                            
                            

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Catagory Update</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                             {!! Form::close() !!}
                            <!-- END FORM-->
                        </div>
                    </div>

@endsection