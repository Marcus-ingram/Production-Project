<?php

namespace App;



use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\LoginToken;
use App\Events\UserLoggedIn;
use Auth;


class AuthenticatesUser 
{
  use ValidatesRequests;
  
   protected $request;
   
   public function __contsruct(Request $request)
   {
       $this->Request = $request;
   }
    public function invite()
    {
        $email = request()->validate(['email' => 'required|email|exists:users']);
        $this->createToken($email)->sending();  
    }
 
   public function login(LoginToken $token){
       Auth::login($token->user);
       $token->delete();
       return redirect()->back();  
   }
    protected function createToken($email)
{
    $user = User::byEmail($email);
  return LoginToken::generateFor($user);
}
}

   
  


