<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function show(){
        $members = Member::all()->where('department','management')->where('position','!=','CEO');
        $membersTop = Member::where('position','CEO')->first();
        $boardsTop = Member::where('position','president')->first();
        $board = Member::all()->where('department','board')->where('position','!=','President');
        return view('team',compact('members','board','membersTop','boardsTop'));
    }
    public function adminShow(){
        $members = Member::paginate(8);
        return view('admin.members.show',compact('members'));
    }
    public function getAddMember(){
        return view('admin.members.create');
    }
    public function postAddMember(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email',
            'contact' => 'required|min:8',
            'position' => 'required',
            'department'=> 'required',
            'image'=>'required|image'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = $request->department.'-'.str_replace(" ","_",$request->name).'.'.$extension ;
            $file->move(public_path('/images/teams/'.$request->department),$filename);
            Member::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'contact'=>$request->input('contact'),
                'position'=>$request->input('position'),
                'department'=>$request->input('department'),
                'image'=> $filename ?? null
            ]);
        }
        return redirect()->route('admin.members.show');
    }
    public function deleteMember(Request $request){
        $id = $request->id; 
        $member = Member::find($id);
        // removing image
        $previousImage = $member->image;
        $previousFilepath = public_path('/images/teams/'.$member->department.'/'.$member->image);
        if(file_exists($previousFilepath)){
            unlink($previousFilepath);
        }
        $member->delete();
        return redirect()->route('admin.members.show');
    }
    public function getEditMember($id){
        $member = Member::findOrFail($id);
        return view('admin.members.edit',compact('member'));
    }
    public function postEditMember(Request $request){
        $id = $request->id;
        $member = Member::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,'.$id,
            'contact' => 'required|min:8',
            'position' => 'required',
            'department'=> 'required',
        ]);
        if($request->hasFile('image')){
            $previousImage = $member->image;
            $previousFilepath = public_path('images/teams/'.$member->department.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->name).'.'.$extension;
            $file->move(public_path('/images/teams/'.$member->department),$filename);
            $member->image = $filename;
        }
        $member->update([
        'name'=> $request->input('name'),
        'position' => $request->input('position'),
        'email'=> $request->input('email'),
        'contact'=>$request->input('contact'),
        'department'=>$request->input('department'),
        'image'=>$member->image
        ]);
        return redirect()->route('admin.members.show');

    }
    //search memebers
 public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Member::where('name', 'LIKE', "%$query%")->orderByRaw("LOCATE(?, name)", [$query])->get();
        return response()->json($results);
    }
}
