<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function show(){
    //fetch from database
    // $members=collect([
    //     [
    //         'name'=> 'Mahendra Kumar Giri',
    //         'position'=> 'Chief Executive',
    //         'email'=>'ceo@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-5.jpg',
    //     ],
    //     [
    //         'name'=> 'Laxman Khatiwada',
    //         'position'=> 'Director',
    //         'email'=>'director@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-1.jpg',
    //     ],
    //     [
    //         'name'=> 'Dinesh Bahadur Niraula',
    //         'position'=> 'Deputy Director',
    //         'email'=>'admin@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-2.jpg',
    //     ],
    //     [
    //         'name'=> 'Ishwor Prasad Bhattarai',
    //         'position'=> 'Assistant Director',
    //         'email'=>'audit@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-3.jpg',
    //     ],
    //     [
    //         'name'=> 'Nirmala Bhattarai',
    //         'position'=> 'Assistant Director',
    //         'email'=>'audit@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-4.jpg',
    //     ]
    //     ]);
    // $board=collect([
    //     [
    //         'name'=> 'Laxman Khatiwada',
    //         'position'=> 'Director',
    //         'email'=>'director@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-1.jpg',
    //     ],
    //     [
    //         'name'=> 'Dinesh Bahadur Niraula',
    //         'position'=> 'Deputy Director',
    //         'email'=>'admin@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-2.jpg',
    //     ],
    //     [
    //         'name'=> 'Ishwor Prasad Bhattarai',
    //         'position'=> 'Assistant Director',
    //         'email'=>'audit@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-3.jpg',
    //     ],
    //     [
    //         'name'=> 'Nirmala Bhattarai',
    //         'position'=> 'Assistant Director',
    //         'email'=>'audit@saharanepal.ccop.np',
    //         'image'=>'/images/members/profile-4.jpg',
    //     ]
    //     ]);
    $members = Member::all()->where('department','management');
    $board = Member::all()->where('department','board');
        return view('team',compact('members','board'));
    }
    public function adminShow(){
        $members = Member::all();
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
        Member::where('id',$id)->delete();
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
}
