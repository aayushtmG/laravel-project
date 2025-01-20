<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ServiceController; 
use App\Http\Controllers\NoticeController; 
use App\Http\Controllers\AdminPageController; 
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\MemberController; 


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/team',[MemberController::class,'show'])->name('team');
Route::get('/messages',function(){
    $messages = collect([
        [
           'name'=>'Ram Bahadur Gurung',
            'image'=>'/images/members/profile-1.jpg',
            'position'=> 'President',
            'email'=>'president@babylon.com',
            'content'=>['As the President of Babylon Cooperative Ltd., I am deeply honored to address you on behalf of our organization. Over the years, our cooperative has remained steadfast in its mission to empower communities, foster innovation, and drive sustainable growth. Our achievements would not have been possible without your unwavering support and dedication. Together, we have created a thriving ecosystem where shared values, mutual trust, and a commitment to excellence have propelled us toward success. As we look to the future, we aim to continue building a cooperative that not only meets the needs of today but also paves the way for future generations to thrive.',
            'Let us remain united in our pursuit of progress as we embrace new opportunities and overcome challenges with resilience and creativity. At Babylon Cooperative Ltd., we believe in the power of collaboration and the strength of community, which have been the cornerstones of our success. Moving forward, we are committed to upholding our principles, fostering innovation, and delivering value to every member and partner associated with us. Thank you for your trust, hard work, and shared vision, which inspire us to reach even greater heights. Together, we will continue to shape a brighter and more sustainable future.']],
            [
                'name'=>'Shyam Bahadur Gautam',
            'image'=>'/images/members/profile-3.jpg',
            'position'=> 'Chief Executive Officer',
            'email'=>'ceo@babylon.com',
            'content'=>['As the CEO of Babylon Cooperative Ltd., I am proud to share that our organization continues to set benchmarks in innovation, sustainability, and community empowerment. We remain focused on delivering exceptional value to our stakeholders while staying true to our core principles of collaboration and mutual growth. Recent initiatives have strengthened our operational efficiency and expanded our impact, ensuring we are well-positioned to seize new opportunities in an ever-evolving landscape.','Our vision is to build a cooperative that not only drives economic progress but also creates lasting social and environmental benefits. By leveraging cutting-edge technology, fostering partnerships, and prioritizing the needs of our members, we are paving the way for a future defined by resilience and growth. The road ahead is filled with potential, and I am confident in our collective ability to overcome challenges and achieve our goals.'
                ]],
                [
           'name'=>'Rameshwor Yadav',
            'image'=>'/images/members/profile-5.jpg',
            'position'=> 'Information Officer',
            'email'=>'officer@babylon.com',
            'content'=>['As the Information Officer of Babylon Cooperative Ltd., I am pleased to highlight the ongoing efforts to enhance communication and transparency across all levels of our organization. Ensuring that our members and stakeholders are well-informed remains a top priority, and we continue to invest in systems and channels that promote timely and accurate dissemination of information. This commitment not only strengthens trust but also empowers everyone involved to contribute effectively to our shared mission.',
            'Our focus is on creating a more connected and collaborative environment by embracing modern tools and practices for information management. By improving accessibility and fostering open dialogue, we aim to support informed decision-making and drive progress in all areas of our cooperative. Clear, consistent, and effective communication will remain at the heart of our approach as we advance toward achieving our collective goals.']
            ]
        ]);
            return view('message',compact('messages'));
            });
Route::get('/contact',function(){
return view('contact');
});
Route::get('/about',function(){
    return view('about');
});


Route::get('/language-switch',[LanguageController::class,'languageSwitch'])->name('language.switch');


//SERVICE 
Route::get('/services/{id}',[ServiceController::class,'show'])->name('services.show');


//ADMIN SECTION
//admin dashboard
Route::get('/admin',[AdminPageController::class,'index'])->name('admin.index');

//Authentication
Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

//Services
Route::get('/admin/services',[ServiceController::class,'adminShow'])->name('admin.services.show');
Route::get('/admin/services/create',[ServiceController::class,'getCreateService'])->name('admin.services.get.create');
Route::post('/admin/services/create',[ServiceController::class,'postCreateService'])->name('services.create');
Route::post('/admin/services/delete',[ServiceController::class,'deleteService'])->name('services.delete');

//Members
Route::get('/admin/members',[MemberController::class,'adminShow'])->name('admin.members.show');
Route::get('/admin/members/create',[MemberController::class,'getAddMember'])->name('admin.members.get.create');
Route::post('/admin/members/create',[MemberController::class,'postAddMember'])->name('members.create');
Route::post('/admin/members/delete',[MemberController::class,'deleteMember'])->name('members.delete');
