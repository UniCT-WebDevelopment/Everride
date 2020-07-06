<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
        
    {

            $this->middleware('auth', ['except' => ['show','index']]);

    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('comments.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Post $post)
    {

        $comment = request()->validate([
            'comment'=> 'required | max:500' , 
        ]);

        

        $id = auth()->user()->comments()->create([

            'content'=>$comment['comment'],
            'post_id' => $post->id,
        ]);

        $feed_id = $post->id;

        auth()->user()->feeds()->create([ 'feed_id'=>$feed_id , 'feed_type' =>'comment']);
        
        return redirect('/p/' . $post->id);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {

        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $this->authorize('update', $comment);
        
        $comment->update(
            request(['content'])
        );

        return redirect("/p/{$comment->post_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $mem = $comment->post_id;
        $comment->delete();
        return redirect("/p/{$comment->post_id}");
    }
}
