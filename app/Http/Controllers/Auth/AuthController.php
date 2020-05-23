<?php

namespace App\Http\Controllers\Auth;


use Socialite;
use Auth;
use App\GitHubLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
   public function redirectToProvider(){
   return Socialite::driver('github')->redirect();
   }
public function handlerProviderCallback(){

    $user = $this->findOrCreateGithubUser(
    Socialite::driver('github')->user());
    
     Auth()->login($user);
     
     if (Auth::check()) {
         //dd($user);
            return redirect()->intended('/');
            
        }
    else{
        return redirect()->intended('/login');
    }
   
    
}
public function findOrCreateGithubUser($githubuser){
    $user = GitHubLogin::firstOrNew(['github_id' => $githubuser->id]);
    
    if($user->exists)
    {
      return $user;  
    }
    else{
    $user->fill([
    'name' => $githubuser->nickname,
    'email' => $githubuser->email,
    'avatar' => $githubuser->avatar
    ])->save();

   return $user;
   }
}
}
