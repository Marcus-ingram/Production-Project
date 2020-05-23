<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageU;
class ImageUController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
      public function store(request $request)
    {
        
       
        $file = $request->file('Image');
    
        $name = $file->getClientOriginalName();
  
        $folder = $request->folder;
        
       
        if($file->move('images', $name))
        {
           $images = new ImageU();
           $images->Image = $name;
           $images->owner_id = auth()->id();
           $images->folder= $folder;
 
           $images->save();
           
           return redirect()->back()->with('message','Image Uploaded!');
}

    }
     
     public function index()
    {
        $folder = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 1)
                               ->get();
        $folder2 = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 2)
                               ->get();
        
    return view('index', compact('folder', 'folder2'));
    }
    
    
    
     public function destroy(ImageU $imageU)
    {
        $imageU->delete();
        return redirect('/index');
        
    }
}
