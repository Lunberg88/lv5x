<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Post;
use View;
use Auth;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    /**
    * @var array
    */

    protected $rules =
    [
        'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'text' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        /*
        $user = Auth::user();
        foreach($user->roles as $role) {
            echo "<pre>" . print_r($role, 1) . "</pre>";
            exit();
        }
        */

        return view('posts.index', ['posts' => $posts]);
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
        $user = Auth::user();
        if(Gate::denies('can-create')){
            return response()->json(['error' => 'Access denied for you!']);
        }
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $post = new Post();
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();
            return response()->json($post);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post]);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();
            return response()->json($post);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $post = Post::findOrFail($id);
        $post->is_published = !$post->is_published;
        $post->save();

        return response()->json($post);
    }

    public function upload(Request $request)
    {
            $load = $request->file('doc')->store('docs');
            echo "<pre>".print_r($load,1)."</pre>"; exit();
            return $load;
    }

    public function upd(Request $request)
    {
        return view('posts.up');
    }

    public function showFile()
    {
        $all = Storage::get('docs/NQfGIajtaXCMncVMi9Sb9PJzsVFQzOksutAQZ19v.txt');

        $file = [];
        $file[] = $all;

        return view('posts.show', ['file' => $file]);
    }

    public function newAdd(Request $request)
    {
        $data = $request->all();
        $data['fio'] = $request->fio;

        return view('posts.add');
    }
}