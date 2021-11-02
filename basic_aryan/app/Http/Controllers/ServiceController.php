<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function ServiceAll()
   {
         $services=DB::table('services')->latest()->get();
       return view('admin.service.index',compact('services'));
   }
   public function AddService()
   {
      return view('admin.service.create');
   }
    public function StoreService(Request $request)
    {
            $data=array();
            $data['title']=$request->title;
            $data['short_des']=$request->short_des;
            $data['created_at']=Carbon::now();
            DB::table('services')->insert($data);
           return Redirect()->route('home.service')->with('message','service added Successfully');
    }

    public function Editservice($id)
    {
        
         $services= DB::table('services')->where('id',$id)->first();
        //  dd($about);
       return view('admin.service.edit' ,compact('services'));
    }

    public function UpdateService(Request $request, $id)
    {
        DB::table('services')->where('id', $id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'updated_at' =>Carbon::now(),
            
            
        ]);
           
           return Redirect()->route('home.service')->with('message','service delete Successfully');
    }

    public function Deleteservice($id)
    {
         DB::table('services')->where('id', $id)->delete();
       return Redirect()->route('home.service')->with('message','service delete Successfully');
    }
}
