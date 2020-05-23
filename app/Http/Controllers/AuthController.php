<?php

namespace App\Http\Controllers;

use Socialite;
use App\Http\Controllers\Controller;
use App\AuthenticatesUser;
use App\LoginToken;
use Illuminate\Http\Request;

class AuthController extends Controller
{


public function login(){
    return view ('login');
}
   
   public function postLogin(AuthenticatesUser $auth){
 

     $auth->invite();
   
     return 'Please go check your Emails';

    return view ('login');

     
     
   }
   public function authenticate(LoginToken $token, AuthenticatesUser $auth)
   {
      
       $auth->login($token);
       
   }
   
   public function redirectToProvider(){
     return Socialite::driver('github')->redirect();
   }
public function handleProviderCallback(){
    $githubuser = Socialite::driver('github')->user();
}

}
