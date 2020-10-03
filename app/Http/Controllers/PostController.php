<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = DB::table('posts')
                ->orderBy('posts.created_at', 'desc')
                ->get();
        $datas=DB::table('users')
        ->Select('users.id','users.first','users.last','users.email')
        ->get();
        return view('posts.main',compact('datas'))->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function add($id)
    {
        $user=new User;
        $user=User::find($id);
        //return view('posts.create');
        return view('posts.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {  
        $this->validate($request,array(
            'title'=>'required|max:255',
            'message'=>'required'
            
        ));
        // $user=new User;
        // $user=User::find($id);
        $posts=new Post;
        $posts->userid=$id;
        $posts->title=$request->title;
        $posts->message=$request->message;
        $posts->save();
        Session::flash('success','New post saved successfully');
        $data=DB::table('posts')
        ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
        ->where('posts.userid',$id)->get();
        //return view('users.profile',compact('data'))->with('id',$id);
        return redirect()->route('profile');

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
        $posts=Post::find($id);
        return view('posts.edit')->withPosts($posts);
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
        $posts=Post::find($id);
        $datas=DB::table('posts')
        ->where('id', $id)
        ->update(['title' => $request->title, 'message' => $request->message, 'userid' =>$posts->userid],);
        Session::flash('success','Post updated successfully');
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Session::flash('success','Post Deleted successfully');
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('profile');
        
    }
}
