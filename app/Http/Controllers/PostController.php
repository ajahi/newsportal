<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class PostController extends Controller
{
    use HasApiTokens;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query=Post::orderBy('id','DESC')->get();
        return PostResource::collection($query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('post');   
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $validation = Validator::make($request->all(), [
            'title'=>['required','unique:posts'],
            'description'=>'required',
            'source'=>['required'],
            'tag_id'=>['required']
            //position is not required 
        ]);
       
        if ($validation->fails()) {
            return response()->json($validation->errors() , 422);
        }
        
        // $request['author']=$id;
        $post=Post::create($request->all());
        $post->tag()->attach($request->tag_id);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        $post->increment('views');
        return new PostResource($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        $validation=Validator::make($request->all(),[
            'title'=>'unique:posts,title',
            'description'=>'required',
            'source'=>'required'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors() , 422);
        }
        $post->fill($request->all())->save();
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);

        $post->delete();
        return 'deleted';
    }
}
