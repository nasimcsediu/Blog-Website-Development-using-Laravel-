<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = DB::table('tbl_comments')->get();
        $mange_comments = view('admin.pages.manage-comments')->with('comments',$result);
        return view('admin.master')->with('admin.pages.manage-comments',$mange_comments);
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
         $data =  array();
         $data['user_id']     = $request->id;
         $data['blog_id']     = $request->blog_id;
         $data['comments']    = $request->comments;

         DB::table('tbl_comments')->insert($data);
         Session::put('message','Post Approve By Admin');
         return Redirect::to('details-blog/'.$request->blog_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function unpublishcomment($comments_id)
    {
      
       DB::table('tbl_comments')->where('comments_id',$comments_id)->update(['publication_status' => 0]);
       return Redirect::to('manage-comments');
    }

    public function publishcomment($comments_id){
        DB::table('tbl_comments')->where('comments_id',$comments_id)->update(['publication_status' => 1]);
       return Redirect::to('manage-comments');
    }

    //delete comments

    public function deletecomment($comments_id){
       DB::table('tbl_comments')->where('comments_id',$comments_id)->delete();
       return Redirect::to('manage-comments');
    }
   //edit comments
    public function editcomment($comments_id){
        $all_comments = DB::table('tbl_comments')->where('comments_id',$comments_id)->get();
        $blog_manage = view('admin.pages.edit-comments')->with('all_comments',$all_comments);

        return view('admin.master')->with('admin.pages.edit-comments',$blog_manage); 
    }
    
    
   
}
