<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Symfony\Component\HttpFoundation\File\File;

use Session;
session_start();
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    ///index===================================
    public function index()
    {
       $this->AuthCheck();
       return view('admin.pages.admin_home');
    }

    //catagori page ============================
    public function AddCatagori(){
      $this->AuthCheck();
      return view('admin.pages.add_catagories');
    }

    //manage catagori page ===========================
    public function manageCatagory(){
        $this->AuthCheck();
        $all_catagory= DB::table('tbl_catagories')->get();
        $manage_catagory = view('admin.pages.manage_catagory')->with('all_catagory_info',$all_catagory);
        return view('admin.master')->with('admin.pages.manage_catagory',$manage_catagory);
    }

    //unpublish catagory=================================
    public function unpublishCatagory($catagory_id){
   
     DB::table('tbl_catagories')->where('catagory_id',$catagory_id)->update(['catagory_ststus' => 0]);

      return Redirect::to('manage-catagory');

    }

    //publish catagory====================================
    public function publishCatagory($catagory_id){

        DB::table('tbl_catagories')->where('catagory_id',$catagory_id)->update(['catagory_ststus'=> 1]);
            return Redirect::to('manage-catagory');
    }

    //delete catafory======================================
    public function deleteCatagory($catagory_id){

        DB::table('tbl_catagories')->where('catagory_id',$catagory_id)->delete();
         return Redirect::to('manage-catagory');
    }

    //edit catagory ========================================
    public function editCatagory($catagory_id){
        $catagory_edit = DB::table('tbl_catagories')->where('catagory_id',$catagory_id)->first();

        $catagory_manage = view('admin.pages.edit-catagory')->with('catagory_manage_info',$catagory_edit);

        return view('admin.master')->with('admin.pages.edit-catagory',$catagory_manage);
    }

    //catagori insert into database =========================
    public function saveCatagori(Request $request){
    
   $data = array();

   $data['catagory_name']        = $request->catagory_name;
   $data['catagory_description'] = $request->catagory_description;
   $data['catagory_ststus']      = $request->catagory_ststus;
   DB::table('tbl_catagories')->insert($data);
   Session::put('message','Successful Add Catagory !!');
   return Redirect::to('add-catagori');
    }

 //add_blog================================================
    public function addBlog(){

        $result = DB::table('tbl_catagories')->get();
        $all_catagorys = view('admin.pages.add_blog')->with('all_catagory_infos',$result);
        return view('admin.master')->with('admin.pages.add_blog',$all_catagorys);
    }

 //insert blog blog ===============================================
    public function saveBlog(Request $request){


      $data=array();
      $data['blog_name']              = $request->blog_name;
      $data['catagory_id']            = $request->catagory_id;
      $data['blog_short_description'] = $request->blog_short_description;
      $data['blog_long_description']  = $request->blog_long_description;
      $data['publication_status']     = $request->publication_status;
      $data['blog_author']            = Session::get('admin_name');
        /*
        upload File
        */

        $file = $request->file('blog_image');
        $filename= $file->getClientOriginalName();
        //$extention=$file->getClientOriginalExtention();
        $picture  = date('His').$filename;
        $image_url='post-image/'.$picture;
        $destinationPath= base_path().'/public/post-image/';
        $success = $file->move($destinationPath,$picture);
        
           if ($success) {
                
      $data['blog_image']= $image_url;
      DB::table('tbl_blog')->insert($data);
      Session::put('messages','Add Successfull Post !!');
      return Redirect::to('add-blog');
       
            }  

            else{
                $error=$files->getErrorMessage();
            }

       
     }

     //manage blog ==========================================
     public function manageBlog(){
        $all_blog = DB::table('tbl_blog')->get();
        $manage_blog = view('admin.pages.manage-blog')->with('manage_blog_info',$all_blog);
        return view('admin.master')->with('admin.pages.manage-blog',$manage_blog);
     }

//unpublish blog===========================================
     public function unpublishBlog($blog_id){
       DB::table('tbl_blog')->where('blog_id',$blog_id)->update(['publication_status' => 0]);
       return Redirect::to('manage-blog');
     }

 //publish blog============================================
     public function publishBlog($blog_id){
     DB::table('tbl_blog')->where('blog_id',$blog_id)->update(['publication_status' => 1]);
       return Redirect::to('manage-blog');
     }

//delete blog==============================================
     public function deleteBlog($blog_id){
     DB::table('tbl_blog')->where('blog_id',$blog_id)->delete();
       return Redirect::to('manage-blog');
     }

//edit blog===============================================
     public function editBlog($blog_id){
        
        $all_blogs = DB::table('tbl_blog')->where('blog_id',$blog_id)->first();
        $result = DB::table('tbl_catagories')->get();
        $blog_manage = view('admin.pages.edit-blog')->with('all_blog',$all_blogs)->with('result',$result);

        return view('admin.master')->with('admin.pages.edit-blog',$blog_manage);
     }

     //detils blog=========================================
     public function detailsBlog($blog_id){
        $blog = DB::table('tbl_blog')->where('blog_id',$blog_id)->first();
        $data['hit_counter'] = $blog->hit_counter +1;
        DB::table('tbl_blog')->where('blog_id',$blog_id)->update($data);
        $all_blog = view('admin.pages.blog-details')->with('blog',$blog);

        return view('blog-details-layout')->with('admin.pages.blog-details',$all_blog);
     }

     //catagory blog =====================================
     public function catagoryBlog($catagory_id){
     
     $all_catagory = DB::table('tbl_blog')->where('publication_status',1)->where('catagory_id',$catagory_id)->get();

     $manage_catagory= view('admin.pages.blog-catagory')->with('all_catagory',$all_catagory);
     return view('blog-details-layout')->with('admin.pages.blog-catagory',$manage_catagory);
     }
 //admin logout ==================================
    public function logout()
    {
     Session::put('admin_name','');
     Session::put('admin_id','');
     Session::put('messages','Successful logout !!!');
     return Redirect::to('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function AuthCheck()
    {
      $admin_id = Session::get('admin_id');
      if ($admin_id) {
          return;
      }

      else{

        return Redirect::to('admin')->send();
      }
    }
} 
