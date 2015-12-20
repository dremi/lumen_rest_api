<?php
  
namespace App\Http\Controllers;
  
use App\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class MemberController extends Controller {
    
    public function index(){
  
        $Members  = Member::all();
  
        return response()->json($Members);
  
    }
  
    public function getMember($id){
  
        $Member  = Member::find($id);
  
        return response()->json($Member);
    }
  
    public function createMember(Request $request){
  
        $Member = Member::create($request->all());
  
        return response()->json($Member);
  
    }
  
    public function deleteMember($id){
        $Member  = Member::find($id);
        $Member->delete();
 
        return response()->json('deleted');
    }
  
    public function updateMember(Request $request,$id){
        $Member  = Member::find($id);
        $Member->name = $request->input('name');
        $Member->address = $request->input('address');
        $Member->phone_number = $request->input('phone_number');
        $Member->save();
  
        return response()->json($Member);
    }
}
?>