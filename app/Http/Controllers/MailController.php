<?php

namespace App\Http\Controllers;
use App\Mail\SignupEmail;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{ 
    public static function sendSignupEmail($name,$email,$verification_code){
        $data =[
            'name' =>$name,
            'email' =>$email,
            'verification_code'=>$verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendResetPasswordEmail($name,$email,$verification_code){
        $value =[
            'name' =>$name,
            'email' =>$email,
            'verification_code'=>$verification_code
        ];
        Mail::to($email)->send(new ResetPassword($value));
    }
}
