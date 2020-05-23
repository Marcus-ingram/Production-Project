<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\auth;
use App\User;

class Admin extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
      
      public function show(){
         $users = collect(User::all());
         
          return view('Admin.showUsers', compact('users'));
      }
      
      public function store(Request $request){
          $input = $request->all();
          dd($input);
          return view('Admin.CollectionUsers');
      }
  }

