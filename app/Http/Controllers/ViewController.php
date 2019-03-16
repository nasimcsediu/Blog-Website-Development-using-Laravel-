<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Session;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
       return view('welcome');
    }

    ///search blog
    public function searchBlog(Request $request){
        $search_text = $request->search_text;
        $search_blog = DB::table('tbl_blog')->where('publication_status',1)->where('blog_name','like','%'.$search_text.'%')->orderBy('blog_id','desc')->get();

         $blog = view('admin.pages.search-blog')->with('search_blog',$search_blog);

        return view('blog-details-layout')->with('admin.pages.search-blog',$blog);
    }

    // public function search(){
    //     return view('admin.pages.search-blog');
    // }

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
}
