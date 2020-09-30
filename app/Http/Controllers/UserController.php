<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function login(){
        return view('users.login');
    }

    public function approve(Request $request){
        $user = DB::table('users')->where('email', $request->email)->first();
        if($user->email==$request->email&&$user->password==$request->password){
            $request->session()->put('data',$request->input());
            $posts=Post::all();
            $data=DB::table('posts')
            ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
            ->where('posts.userid',$user->id)->get();
            Session::flash('success','Login Successful');
            return view('users.profile',compact('data'))->with('id',$user->id);
            
        }
        else{
            Session::flash('success','Login Unsuccessful');
            return back();
        }
       
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
            'first'=>'required|max:255',
            'last'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required'
        ));
        $users= new User;
        $users->first=$request->first;
        $users->last=$request->last;
        $users->email=$request->email;
        $users->password=$request->password;
        $users->save();
        Session::flash('success','New User created successfully');
        return view('users.login');
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
