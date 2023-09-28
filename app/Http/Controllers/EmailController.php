<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    //
    public function index() {
        $emails = Email::orderBy('created_at', 'DESC')->get();
        return view('admin.email', compact('emails'));
    }
    public function getEmailDelete( string $id)
    {
        //
        Email::find($id)->delete();
        // $id->delete();
        return redirect()->back()->with('success','Xóa email thành công');
    }
    public function getEmailEdit(string $id) {
        $emails =  Email::find($id);
       return view('admin.modal.email_edit', compact('emails'));
   }
   
   public function postEmailEdit(Request $request, string $id) {
       $this->validate($request, [
           
           'status' => 'required',
          
       ], [
               
               'status.required' => 'Bạn chưa nhập status',
              
           ]);
      
       $status = $request->status; 
      
      
       DB::table('contacts')->where('id', $id)->update([
           'status' =>   $status ,
           
          
       ]);
       
       return redirect(route('admin.getEmailList'))->with('success','Cập nhật email thành công!');
      
      
       // return redirect()->back()->with('success','Sửa danh mục thành công');
   }
}
