<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageU;
class TimeLineController extends Controller
{
    public function time()
    {
         $folder = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 1)
                               ->get();
        $folder2 = ImageU::where('owner_id', auth()->id())
                               ->where('folder', 2)
                               ->get();
        return view('Time', compact('folder', 'folder2'));
    }
}
