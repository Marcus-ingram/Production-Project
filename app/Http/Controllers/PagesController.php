<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;

class PagesController extends Controller
{
    public function home()
    {
        return view('welcome',[
    'wonderful' => 'wonderful'
    ]);
    }
    public function index()
    {
        
        return view('index');
    }
    public function test()
    {
        return view('testingarrays');
    }
    public function blog()
    {
        $signs = [ 
        'press register and register a account',
        'Create blog posts',
        'Comment on other peoples blogs',
        'Manage your blogs'
        ];
        return view('blog', compact('signs')
);
    }
     public function account(Project $project)
    {
        abort_unless(\Gate::allows('policy', $project), 403);
        return view('/Account/account');
        
    }
}
