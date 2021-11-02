<?php

namespace App\Http\Controllers;
use Image;
use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
class BrandController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllBrand()
    {
        $brands=Brand::latest()->paginate(5);
        return view('admin.Brand.index',compact('brands'));
    }
    public function storebrand( Request $request)
    {
          $validated = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
        
         ],
           [
               'brand_name.required' =>'Please Input Brand Name',
               'brand_name.min' =>'brand longer Then 4 Charecter',

           ]);

           $brand_image= $request->file('brand_image');

  
        //    $name_gen =hexdec(uniqid());
        //    $img_ext =strtolower($brand_image->getClientOriginalExtension());
        //    $img_name=$name_gen.'.'.$img_ext;
        //    $up_location='image/brand/';
        //    $last_img =$up_location.$img_name;
        //    $brand_image->move($up_location,$img_name);

        $name_gen =hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make( $brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

         $last_img='image/brand/'.$name_gen;

            $brandsAdd=  Brand::insert([
               'brand_name'=>$request->brand_name,
               'brand_image'=>$last_img,
               'created_at'=> Carbon::now()
           ]);
        //    Toastr::success('Post added successfully :)','Success');
           return Redirect()->back()->with('message','Data added Successfully');
    }
    public function Edit($id)
    {
       $brands= Brand::find($id);
       return view('admin.Brand.edit' ,compact('brands'));
    }
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        
         ],
           [
               'brand_name.required' =>'Please Input Brand Name',
               'brand_name.min' =>'brand longer Then 4 Charecter',
           ]);


           $old_image = $request->old_image;
            $brand_image =  $request->file('brand_image');

        if( $brand_image){
             $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
           
          
           return Redirect()->back()->with('success','Brand update Successfull');  
        }else{
             Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
        ]);
           
          
           return Redirect()->back()->with('message','Data added Successfully');  
        }
        
        
       
    }

    public function Delete($id)
    {
        $image =Brand::find($id);
        $old_image=$image->brand_image;
        unlink( $old_image);
        
        Brand::find($id)->delete();
         return Redirect()->back()->with('success','Brand Deleted Successfull');  
    }
    
// this if for multi image for all Methods

public function multipic()
{
    $images =Multipic::all();
    return view('admin.multipic.index' ,compact('images'));
}

public function storeImg(Request $request)
{
     $image= $request->file('image');

    foreach( $image as $multi_img){

   
        

        $name_gen =hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make( $multi_img)->resize(300,300)->save('image/multi/'.$name_gen);

         $last_img='image/multi/'.$name_gen;

             Multipic::insert([
               'image'=>$last_img,
               'created_at'=> Carbon::now()
           ]);
            }//end of the foreach
          
           return Redirect()->back()->with('success','img Inserted Successfull');
}

public function Logout()
{
   Auth::logout();
   return Redirect()->route('login')->with('success','User Logout');
}
}
