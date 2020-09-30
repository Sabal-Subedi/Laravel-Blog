<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Session;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function profile(){
        if(session()->has('data')){
            $value=session()->get('data');
            $users=DB::table('users')
            ->select('users.id','users.first','users.last','users.email')
            ->where('users.email',$value['email'])->get();
            foreach($users as $key){
                $id=$key->id;
            }
            // return $id;
            $data=DB::table('posts')
            ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
            ->where('posts.userid',$id)->get();
            return view('users.profile',compact('data'))->with('id',$id);
        }
        else{
            Session::flash('success','Please login !!!!!!');
            return redirect()->route('home');
        }
    }

    public function userprofile(){
        if(session()->has('data')){
            $value=session()->get('data');
            $users=DB::table('users')
            ->select('users.id','users.first','users.last','users.email')
            ->where('users.email',$value['email'])->get();
            return view('pages.userprofile')->with('users',$users);
            // foreach($posts as $key){
            //     $id=$key->id;
            // }
            // return $id;
            // $data=DB::table('posts')
            // ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
            // ->where('posts.userid',$id)->get();
            // return view('users.profile',compact('data'))->with('id',$id);
        }
        else{
            Session::flash('success','Please login !!!!!!');
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about');
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
        $data=DB::table('comments')
            ->Select('comments.commentid','comments.name','comments.email','comments.comment','comments.post_id','comments.created_at')
            ->where('comments.post_id',$id)->get();
        $posts=Post::find($id);
        return view('pages.allpost',compact('data'))->withPosts($posts);
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
