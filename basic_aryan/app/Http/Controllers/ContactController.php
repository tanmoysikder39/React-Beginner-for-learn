<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
   public function AdminContact()
   {   $contacts= DB::table('contacts')->get();
       return view('admin.contact.index',compact('contacts'));
   }

   public function AddContact()
  {
      return view('admin.contact.create');
  }

  public function StoreContact(Request $request)
  {
         $data=array();
            $data['address']=$request->address;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['created_at']=Carbon::now();
            // dd($data);
           $daata= DB::table('contacts')->insert($data);
        //    dd($daata);
           return Redirect()->route('admin.contact')->with('message','Contact added Successfully');
  }


  public function EditContact($id)
  {
        $Contact= DB::table('contacts')->where('id',$id)->first();
        //  dd($about);
       return view('admin.contact.edit' ,compact('Contact'));
  }

  public function UpdateContact( Request $request ,$id)
  {
       DB::table('contacts')->where('id', $id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' =>Carbon::now(),
            
            
        ]);
           

           return Redirect()->route('admin.contact')->with('message','contact update Successfully');
  }
   public function DeleteContact($id)
    {
      DB::table('contacts')->where('id', $id)->delete();
       return Redirect()->route('admin.contact')->with('message','Contact delete Successfully');
    }


    public function HomeContact()
    { $contact=DB::table('contacts')->first();
        return view('pages.contact',compact('contact'));
    }

    public function ContactForm(Request $request)
    {
          $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['subject']=$request->subject;
            $data['message']=$request->message;
            $data['created_at']=Carbon::now();
            // dd($data);
           $daata= DB::table('contact_forms')->insert($data);
        //    dd($daata);
           return Redirect()->route('contact')->with('message','Form Submit Successfully');
    }

    public function FontMsg()
    { $allmsg=DB::table('contact_forms')->latest()->get();
       return view('admin.contact.message' ,compact('allmsg'));
    }

    public function Deletemsg($id){
        DB::table('contact_forms')->where('id', $id)->delete();
       return Redirect()->route('admin.message')->with('message','message  delete Successfully');
    }
}
