<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function HomeSlider()
   {  
    $sliders=DB::table('sliders')->latest()->get();
    return view('admin.slider.index',compact('sliders'));
     
   }
   public function AddSlider()
   {
       return view('admin.slider.create');
   }

   public function StoreSlider(Request $request)
   {
        //   $validated = $request->validate([
        // 'title' => 'required|unique:brands|min:4',
        // 'image' => 'required|mimes:jpg,jpeg,png',
        
        //  ],
        //    [
        //        'title.required' =>'Please Input Brand Name',
        //        'title.min' =>'brand longer Then 4 Charecter',

        //    ]);

           $slider_image= $request->file('image');


        $name_gen =hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make( $slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

         $last_img='image/slider/'.$name_gen;

            // query builder 
            $data=array();
            $data['title']=$request->title;
            $data['description']=$request->description;
            $data['image']=$last_img;
            DB::table('sliders')->insert($data);
        //    Toastr::success('Post added successfully :)','Success');
           return Redirect()->route('home.slider')->with('message','slider added Successfully');
    }

    public function Edit($id)
    {
      $slider= DB::table('sliders')->where('id',$id)->first();
       return view('admin.slider.edit' ,compact('slider'));
    }

    public function update(Request $request, $id)
    {
            $old_image = $request->old_image;
            $slider_image =  $request->file('image');
           if( $slider_image){
             $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);
        unlink($old_image);
         DB::table('sliders')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,  
        ]);
           return Redirect()->back()->with('message','slider update Successfully');  
        }else{
           DB::table('sliders')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
           return Redirect()->route('home.slider')->with('message','slider update Successfully');
        }
          
    }

    public function Delete(Request $request, $id)
    {
      $image = DB::table('sliders')->where('id', $id)->first();
        $old_image=$image->image;
        unlink( $old_image);
        
       
          $delete = DB::table('sliders')->where('id', $id)->delete();
         return Redirect()->back()->with('message','slider delete Successfully');
    }
   
}
