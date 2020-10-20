<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

    public function forgetpassword(){
        return view('users.forgetpassword');
    }

    public function resetpassword(Request $request){
        $users = DB::table('users')
        ->Select('users.id','users.first','users.last','users.email','users.password','users.created_at','users.verification_code','users.image','users.is_verified')
        ->where('email', $request->email)->get();
        if(!$users->isEmpty()){
            foreach($users as $user){
                $id=$user->id;
                $name=$user->first;
                $email=$user->email;
                $verification_code=$user->verification_code;
                $data=[
                    'name' =>$name,
                    'email' =>$email,
                    'verification_code'=>$verification_code
                ];
            }
                MailController::sendResetPasswordEmail($name,$email,$verification_code);
                return view('users.resetpassword',compact('data'))->with('id',$id);
        }
        else{
            Session::flash('success','Please enter correct information');
            return view('users.login');
        }
    }

    public function login(){
        return view('users.login');
    }

    public function approve(Request $request){
        $user = DB::table('users')->where('email', $request->email)->first();
        if($user==null){
            Session::flash('success','Information Incorrect!!. Enter Correct Information');
            return back();
        }
        if($user->email==$request->email&&$user->password==$request->password){  
            if($user->is_verified!=0)
            {
                session()->put('data',$request->email);
                $posts=Post::all();
                $data=DB::table('posts')
                ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
                ->where('posts.userid',$user->id)->get();
                Session::flash('success','Login Successful');
                return view('users.profile',compact('data'))->with('id',$user->id);
            }
            else{
                Session::flash('success','Please Verify Your Account');
                $data=DB::table('users')
                ->Select('users.id','users.first','users.last','users.email','users.created_at','users.verification_code','users.image')
                ->where('users.email',$request->email)->get();
                return view('users.verifyAccount',compact('data'))->with('id',$user->id); 
            }
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
    public function upload($id){
        $data=DB::table('users')
            ->Select('users.id','users.first','users.last','users.created_at','users.verification_code','users.image')
            ->where('users.id',$id)->get();
        return view('users.updateUser',compact('data'));
    }

    public function updateUser(Request $request, $id){
        if($request->has('image')){
                $file= $request->image;
                $extension = $file->getClientOriginalExtension();
                $profilename=$request->first.".".$extension;
                $request->image->storeAs('/public', $profilename);
                $url = Storage::url($profilename);
                $data=DB::table('users')
                    ->where('id', $id)
                    ->update(['first' => $request->first, 'last' => $request->last, 'password' =>$request->password,'image' =>$profilename]);
                $users=DB::table('users')
                    ->select('users.id','users.first','users.last','users.email','users.image')
                    ->where('users.id',$request->id)->get();
                Session::flash('success', "Update Success !");
                return view('pages.userprofile')->with('users',$users);
            }
        else{
            Session::flash('success', "Please Try Again!");
            return Redirect()->back();
        }
    }

    public function uploadImage(Request $request ,$id){
        $data=User::find($id);
        if($request->has('image')){
            $file= $request->image;
            $extension = $file->getClientOriginalExtension();
            $profilename=$data->first.".".$extension;
            $request->image->storeAs('/public', $profilename);
            $url = Storage::url($profilename);
            $users= db::table('users')
            ->where('id', $id)
            ->update(['image' => $profilename]);
            $data=DB::table('users')
            ->Select('users.id','users.first','users.email')
            ->where('users.id',$id)->get();
            Session::flash('success','A verification code has been sent to your email. Please enter the code to verify your account.');
            return view('users.verifyAccount',compact('data','id'));
        }
        else{
            Session::flash('success', "Please Try Again!");
            return Redirect()->back();
        }
    }

    public function verifyAccount(Request $request ,$id){
        $data=User::find($id);
        if($request->verification==$data->verification_code){
            $Value=DB::table('users')
                ->where('id', $id)
                ->update(['is_verified' =>true]);  
            $user=User::find($id);
            $posts=Post::all();
            session()->put('data',$user->email);
            
            $data=DB::table('posts')
            ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
            ->where('posts.userid',$id)->get();
            Session::flash('success','Account Verified. Login Successful');
            return view('users.profile',compact('data'))->with('id',$id);
        }
        else{
            Session::flash('success', "Verification code Error .Please Try Logging Again!");
            return Redirect()->route('loginpage');
        }
    }

    public function resetAccountPassword(Request $request ,$id){
        $data=User::find($id);
        if($request->verification==$data->verification_code){
            return view('users.newpassword')->with('id',$id);
        }
        else{
            Session::flash('success', "Verification code Error .Please Try Again!");
            return Redirect()->route('loginpage');
        }
    }


    public function changePassword(Request $request, $id){
        if($request->newpassword!=null){
                $value=DB::table('users')
                    ->where('id', $id)
                    ->update(['password' =>$request->newpassword]);
                $users=User::find($id);
                session()->put('data',$users->email);
                $data=DB::table('posts')
                ->Select('posts.id','posts.title','posts.message','posts.created_at','posts.userid')
                ->where('posts.userid',$id)->get();
                Session::flash('success','Password Reset Successful!');
                return view('users.profile',compact('data'))->with('id',$id);
            }
        else{
            Session::flash('success', "Please Try Again!");
            return Redirect()->back();
        }
    }

    public function skipImage($id){
            $profilename="defaultimg.jpg";
            $users= db::table('users')
            ->where('id', $id)
            ->update(['image' => $profilename]);
            $data=DB::table('users')
            ->Select('users.id','users.first','users.email')
            ->where('users.id',$id)->get();
            Session::flash('success','A verification code has been sent to your email. Please enter the code to verify your account.');
            return view('users.verifyAccount',compact('data','id'));
    }

    public function store(Request $request)
    {
        $random = rand(100000,999999);
        $this->validate($request,array(
            'first'=>'required|max:255',
            'last'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ));
        $users= new User;
        $users->first=$request->first;
        $users->last=$request->last;
        $users->email=$request->email;
        $users->password=$request->password;
        $users->verification_code=$random;
        $users->save();
        if($users!=null){
            MailController::sendSignupEmail($users->first,$users->email,$users->verification_code);
            Session::flash('success','Please choose your Profile Picture');
            return view('users.profilepicture')->with('id',$users->id);
            
        }
        else{
            Session::flash('success','Please enter correct information');
            return view('users.login');
        }
        // Session::flash('success','New User created successfully');
        // return view('users.login');
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
