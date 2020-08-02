<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = auth()->user()->id;

        $inputs = $request->all();

        $posts = new Post ();
        $posts->title = $inputs['title'];
        $posts->description = $inputs['description'];        

        $posts->save();

        return response()->json([
            'success'=> true,
            'data' => $posts->get()
 
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('id',$id)->get();
        return response()->json([
           'success'=> true,
           'data'=> $posts

        ]);
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
        $inputs = $request->all();

        $posts = Post::where('id',$id)->first();
        $posts->update($inputs);
        
        return response()->json([
            'success'=> true,
            'data'=> $posts,
 
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
            'data'=> 'Successfully Deleted'
 
         ]);
    }
}
