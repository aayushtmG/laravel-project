<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Album;
use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Slider;

class AdminPageController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $lists =collect([
            [
                'title'=> 'Home Page Sliders',
                'quantity'=> Slider::count(),
                'link'=>'/admin/sliders'
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
            ],
            [
                'title'=> 'Services',
                'quantity'=> Service::count(),
                'link'=>'/admin/services'
            ],
            [
                'title'=> 'Gallery',
                'quantity'=> Album::count(),
                'link'=>'/admin/gallery'
            ]
            ]);
        return view('admin/home',compact('lists'));
    }
    public function show($pageName){
        return view('admin/pages/'.$pageName);
    }
    public function settings(){
        $settings = Setting::find(1);
        $slider_images = Slider::all();
        return view('admin/settings',compact('settings','slider_images'));
    }
public function settingsUpdate(Request $request)
{
    $settings = Setting::find(1);
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
    }
    // Update other fields
    $settings->update([
        'banner_image' => $settings->banner_image,
        'logo_image' => $settings->logo_image,
        'toll_free_number' => $request->toll_free_number,
        'company_email' => $request->company_email,
        'company_introduction' => $request->company_introduction,
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
