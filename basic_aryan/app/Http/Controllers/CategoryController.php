<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Allcat()
    {
        //EOR 
        $categories = Category::latest()->paginate(5);
        $trachCat=Category::onlyTrashed()->latest()->paginate(3);
        //Query Builder
        //  $categories =DB::table('categories')
        //  ->join('users','categories.user_id','users.id')
        //  ->select('categories.*','users.name')
        //  ->latest()->paginate(5);
       return view('admin.category.index',compact('categories','trachCat'));
    }
     public function AddCat(Request $request)
    {
         $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        
         ],
           [
               'category_name.required' =>'Please Input Category Name',
               'category_name.max' =>'Category Less Then 255 Charecter',
           ]
    );
            Category::insert([
                'category_name'=>$request->category_name,
                'user_id'=>Auth::user()->id,
                'created_at'=>Carbon::now(),
            ]);

            // $category =new Category();
            // $category->category_name=$request->category_name;
            // $category->user_id=Auth::user()->id;
            // $category->save();
            // created at and updated at its auto upload in this method

            // query builder 
            // $data=array();
            // $data['category_name']=$request->category_name;
            // $data['user_id']=Auth::user()->id;
            // DB::table('categories')->insert($data);

            return Redirect()->back()->with('success','Category Inserted Successfully');




    }

    public function Edit($id)
    {
       $categories =Category::find($id);
       return view('admin.category.edit',compact('categories'));
    }
    public function Update(Request $request, $id)
    {
        $update =Category::find($id)->update([
              'category_name'=>$request->category_name,
                'user_id'=>Auth::user()->id,
        ]);
          return Redirect()->route('all.category')->with('success','Category update Successfully');
    }


    public function SoftDelete($id)
    {
        $delete= Category::find($id)->delete();
       return Redirect()->back()->with('success','Soft Delete SuccessFully');
    }

    public function Restore($id)
    {

       $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','category restore SuccessFully');
    }

    public function Pdelete($id)
    {
       $delete =Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','category permanently delete SuccessFully');
    }
}
