<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts=Post::all();
        return view('posts.main')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=new User;
        $user=User::find($id);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|max:255',
            'message'=>'required'
            
        ));
        $posts=new Post;
        $posts->title=$request->title;
        $posts->message=$request->message;
        $posts->save();
        
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data=DB::table('posts')
        //     ->Join('comments', 'posts.id', '=', 'comments.post_id')
        //     ->Select('posts.id','posts.title','posts.message','comments.commentid','comments.name','comments.email','comments.comment','comments.post_id','comments.created_at')
        //     ->where('posts.id',$id)
        //     ->get();
        //     return view('pages.show',compact('data'));
        //     return $data;
        $data=DB::table('comments')
            ->Select('comments.commentid','comments.name','comments.email','comments.comment','comments.post_id','comments.created_at')
            ->where('comments.post_id',$id)->get();
        $posts=Post::find($id);
        return view('posts.show',compact('data'))->withPosts($posts);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);
        $posts->delete();
    }
}
