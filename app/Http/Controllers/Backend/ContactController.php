<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public function index(){
        $contact=Contact::where('is_delete',0)->orderByDesc('created_at')->get();
        return view('backend.contact.list',['contact'=>$contact]);
    }
    public function edit($id){

        try{
            $contact=Contact::find($id);
            if($contact){
                return view('backend.contact.detail',[
                    'contact'=>$contact
                ]);
            }else{
                return redirect()->back()->with(['error'=>'Liên hệ không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function update($id, Request $request){
        try{
            $contact=Contact::find($id);
            if($contact){
                $contact->status=$request->status;
                $contact->save();
                return redirect()->back()->with(['success'=>'Cập nhật thành công!!']);
            }else{
                return redirect()->back()->with(['error'=>'Liên hệ không tồn tại!!']);
            }
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Cập nhật ko thành công!!']);
        }
    }
    public function Delete($id){
        try{
            $contact=Contact::find($id);
            return view('backend.contact.delete',[
                'contact'=>$contact
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $contact=Contact::find($id);
            if($contact){
                $contact->is_delete=1;
                if($contact->save()){
                    return redirect()->back()->with('success','Xóa Liên hệ thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa Liên hệ thất bại!');
                }
            }else{
                return redirect()->back()->with('error','Liên hệ không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
