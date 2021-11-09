<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortFolioController extends Controller
{
    public function portfolio()
    {
        $image=DB::table('multipics')->get();
       return view('pages.portfoilo',compact('image'));
    }

    
}
