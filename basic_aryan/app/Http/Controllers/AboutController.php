<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function AboutAll()
    {
         $abouts=DB::table('home_about')->latest()->get();
       return view('admin.homeAbout.index',compact('abouts'));
    }

    public function AddAbout()
    {
      return view('admin.homeAbout.create');
    }
    public function StoreAbout(Request $request)
    {
            $data=array();
            $data['title']=$request->title;
            $data['short_des']=$request->short_des;
            $data['long_des']=$request->long_des;
            $data['created_at']=Carbon::now();
            DB::table('home_about')->insert($data);
           return Redirect()->route('home.about')->with('message','About added Successfully');
    }
     public function EditAbout($id)
    {
         $about= DB::table('home_about')->where('id',$id)->first();
        //  dd($about);
       return view('admin.homeAbout.edit' ,compact('about'));
    }

    public function UpdateAbout(Request $request, $id)
    {

        // method 1 query builder
        // $data=array();
        //     $data['title']=$request->title;
        //     $data['short_des']=$request->short_des;
        //     $data['long_des']=$request->long_des;
        //     $data['updated_at']=Carbon::now();
        //     DB::table('home_about')->where('id',$id)->update($data);

        //method 2 query builder
        DB::table('home_about')->where('id', $id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'updated_at' =>Carbon::now(),
            
            
        ]);
           

           return Redirect()->route('home.about')->with('message','About update Successfully');
    }
    public function DeleteAbout($id)
    {
      DB::table('home_about')->where('id', $id)->delete();
       return Redirect()->route('home.about')->with('message','About delete Successfully');
    }
}
