<?php

namespace App\Http\Controllers;

use App\Openings;
use Auth;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new Blog();
        $news->title = $request->title;
        $news->slug = str_slug($request->title, '-');
        $news->short = $request->short;
        $news->full = $request->full;
        $news->user_id = Auth::id();
        $news->save();

        return redirect('admin/blog')->with(['message' => 'News successfully added!', 'alert-type' => 'success']);

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
        Blog::find($id)->delete();

        return redirect('/admin/blog')->with(['message' => 'News successfully deleted!', 'alert-type' => 'success']);
    }

    public function dashboard()
    {
    	$news = Blog::latest()->paginate(10);

    	return view('admin.blog_dashboard', ['news' => $news]);
    }

    public function view($id)
    {
    	$blog_view = Blog::find($id);

    	return view('admin.blog.blog_view', compact('blog_view'));
    	//return response()->json(['status' => 'success', 'data' => $blog_view], 200);
    }
}
