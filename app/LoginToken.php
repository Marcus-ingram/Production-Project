<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Mail;
use auth;
use Collective\Html\HtmlFacade;
use App\HTML;
class LoginToken extends Model
{
    protected $fillable = ['user_id', 'token'];
    public function getRouteKeyName()
    {
        return 'token';
    }
    public static function generateFor(User $user)
    {
        return static::create([
       'user_id' => $user->id,
       'token' => str_random(50)]);
   }

    
  public function sending(){
     
      $url = url('login/token', $this->token);
     
      Mail::raw( $url,
        function ($message) {
            $message->to($this->user->email)
            ->subject('Login to ForExif');});
  }
    
    public function user()
    {
       return $this->belongsTo(User::Class);
    }
}
