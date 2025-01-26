<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\Notice;
use App\Models\Setting;

class AdminPageController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $lists =collect([
            [
                'title'=> 'Home Page Sliders',
                'quantity'=> '5',
                'link'=>'/admin'
            ],
            [
                'title'=> 'Members',
                'quantity'=> Member::count(),
                'link'=>'/admin/members'
            ],
            [
                'title'=> 'News',
                'quantity'=> News::count(),
                'link'=>'/admin/news'
            ],
            [
                'title'=> 'Events',
                'quantity'=> Event::count(),
                'link'=>'/admin/events'
            ],
            [
                'title'=> 'Notices',
                'quantity'=> Notice::count(),
                'link'=>'/admin/notices'
            ]
            ]);
        return view('admin/home',compact('lists'));
    }
    public function show($pageName){
        return view('admin/pages/'.$pageName);
    }
    public function settings(){
        $settings = Setting::find(1);
        return view('admin/settings',compact('settings'));
    }
public function settingsUpdate(Request $request)
{
    $settings = Setting::find(1);
    dd($request->sider_images);
    if ($request->hasFile('slider_images')) {
        $images = array();
        foreach ($request->file('slider_images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = explode('.',$file->getClientOriginalName())[0];
            $filename = $name  . '.' . $extension;
            $file->move(public_path('/images/settings/sliders'), $filename);
            $images[]= $filename;
        }
        dd($images);
    }
    // Handle logo image upload
    if ($request->hasFile('logo_image')) {
        // Delete the old logo file if it exists
        if (file_exists(public_path('/images/settings/' . $settings->logo))) {
            unlink(public_path('/images/settings/' . $settings->logo));
        }
        // Upload the new logo file
        $file = $request->file('logo_image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'logo' . '.' . $extension;
        $file->move(public_path('/images/settings/'), $filename);
        // Update the logo and home_slider_images columns with the new file name
        $settings->logo = $filename;
    }
    if ($request->hasFile('banner_image')) {
        // Delete the old logo file if it exists
        if (file_exists(public_path('/images/settings/' . $settings->banner_image))) {
            unlink(public_path('/images/settings/' . $settings->banner_image));
        }
        // Upload the new logo file
        $file = $request->file('banner_image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'banner' . '.' . $extension;
        $file->move(public_path('/images/settings/'), $filename);
        // Update the logo and home_slider_images columns with the new file name
        $settings->banner_image = $filename;
        $settings->home_slider_images = json_encode([$filename]);
    }
    // if ($request->hasFile('home_slider_images')) {
    //     // Delete the old logo file if it exists
    //     if ($settings->home_slider_images && file_exists(public_path('/images/settings/sliders/' . $settings->home_slider_images))) {
    //         unlink(public_path('/images/settings/' . $settings->logo));
    //     }
    //     // Upload the new logo file
    //     $file = $request->file('logo_image');
    //     $extension = $file->getClientOriginalExtension();
    //     $filename = 'logo' . '.' . $extension;
    //     $file->move(public_path('/images/settings/'), $filename);
    //     // Update the logo and home_slider_images columns with the new file name
    //     $settings->home_slider_images = json_encode([$filename]);
    // }

    // Update other fields
    $settings->update([
        'banner_image' => $settings->banner_image,
        'toll_free_number' => $request->toll_free_number,
        'company_email' => $request->company_email,
        'address' => $request->address,
        'organization_members' => $request->organization_members,
        'organization_staffs' => $request->organization_staffs,
        'organization_branches' => $request->organization_branches,
        'organization_savings' => $request->organization_savings,
        'organization_loans' => $request->organization_loans,
        'organization_shares' => $request->organization_shares,
    ]);

    return redirect()->route('settings')->with('success', 'Settings updated successfully.');
}

}
