<?php

namespace App\Http\Controllers;
use App\ImageU;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    //
    public function Map(){
        $folder = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 1)
                               ->get();
        $folder2 = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 2)
                               ->get();
        return view('Map', compact('folder', 'folder2'));
        
    }
}
