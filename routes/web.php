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
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\MemberController; 
use App\Http\Controllers\EventController; 
use App\Http\Controllers\NewsController; 
use App\Http\Controllers\MessageController; 
use App\Http\Controllers\NewsEventsController; 
use App\Http\Controllers\SliderController; 
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\GalleryController; 
use App\Http\Controllers\InquiryController; 
use Illuminate\Http\Request;


Route::get('/', [HomeController::class,'index'])->name('home');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('guest')->group(function(){
  Route::get('/login',[AuthController::class,'showLogin'])->name('show.login');
  Route::post('/login',[AuthController::class,'login'])->name('login');
  Route::get('/register',[AuthController::class,'showRegister'])->name('show.register');
  Route::post('/register',[AuthController::class,'register'])->name('register');
});

Route::get('/lang/{language}', [LanguageController::class,'languageSwitch']);
Route::get('/language-switch',[LanguageController::class,'languageSwitch'])->name('language.switch');
Route::get('/team',[MemberController::class,'show'])->name('team');
Route::get('/messages',[MessageController::class,'show'])->name('messages');
Route::get('/contact',function(){return view('contact');});
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/news-events',[NewsEventsController::class,'show'])->name('news-events');
Route::get('/notices',[NoticeController::class,'index'])->name('notices');
Route::get('/notices/{id}',[NoticeController::class,'show'])->name('notices.show');
Route::get('/services/{id}',[ServiceController::class,'show'])->name('services.show');
Route::get('/services/',[ServiceController::class,'index'])->name('services.all');
Route::get('/news/{id}',[NewsController::class,'show'])->name('news.show');
Route::get('/event/{id}',[EventController::class,'show'])->name('event.show');
Route::get('/album',[GalleryController::class,'index'])->name('gallery.all');
Route::get('/album/{id}',[GalleryController::class,'show'])->name('gallery.get');


//Inquiries
Route::post('/admin/inquiry',[InquiryController::class,'post'])->name('admin.inquiry.post');

//ADMIN SECTION---------------------------------------------
//admin dashboard
Route::middleware('auth')->group(function(){
  Route::get('/admin',[AdminPageController::class,'index'])->name('admin.index');
  Route::get('/admin/settings',[AdminPageController::class,'settings'])->name('settings');
  Route::post('/admin/settings',[AdminPageController::class,'settingsUpdate'])->name('settings.update');

//Services
Route::get('/admin/services',[ServiceController::class,'adminShow'])->name('admin.services.show');
Route::get('/admin/services/create',[ServiceController::class,'getCreateService'])->name('admin.services.get.create');
Route::post('/admin/services/create',[ServiceController::class,'postCreateService'])->name('services.create');
Route::get('/admin/services/edit/{id}',[ServiceController::class,'getEditService'])->name('admin.services.get.edit');
Route::post('/admin/services/edit',[ServiceController::class,'postEditService'])->name('services.edit');
Route::post('/admin/services/delete',[ServiceController::class,'deleteService'])->name('services.delete');


//Members
Route::get('/admin/members',[MemberController::class,'adminShow'])->name('admin.members.show');
Route::get('/admin/members/create',[MemberController::class,'getAddMember'])->name('admin.members.get.create');
Route::post('/admin/members/create',[MemberController::class,'postAddMember'])->name('members.create');
Route::get('/admin/members/edit/{id}',[MemberController::class,'getEditMember'])->name('admin.members.get.edit');
Route::post('/admin/members/edit',[MemberController::class,'postEditMember'])->name('members.edit');
Route::post('/admin/members/delete',[MemberController::class,'deleteMember'])->name('members.delete');
Route::get('/admin/members/search',[MemberController::class,'search']);

//Events
Route::get('/admin/events',[EventController::class,'adminShow'])->name('admin.events.show');
Route::get('/admin/events/create',[EventController::class,'getAddEvent'])->name('admin.events.get.create');
Route::post('/admin/events/create',[EventController::class,'postAddEvent'])->name('events.create');
Route::get('/admin/events/edit/{id}',[EventController::class,'getEditEvent'])->name('admin.events.get.edit');
Route::post('/admin/events/edit',[EventController::class,'postEditEvent'])->name('events.edit');
Route::post('/admin/events/delete',[EventController::class,'deleteEvent'])->name('events.delete');


//News
Route::get('/admin/news',[NewsController::class,'adminShow'])->name('admin.news.show');
Route::get('/admin/news/create',[NewsController::class,'getAddNews'])->name('admin.news.get.create');
Route::post('/admin/news/create',[NewsController::class,'postAddNews'])->name('news.create');
Route::get('/admin/news/edit/{id}',[NewsController::class,'getEditNews'])->name('admin.news.get.edit');
Route::post('/admin/news/edit',[NewsController::class,'postEditNews'])->name('news.edit');
Route::post('/admin/news/delete',[NewsController::class,'deleteNews'])->name('news.delete');

//Notices
Route::get('/admin/notices',[NoticeController::class,'adminShow'])->name('admin.notices.show');
Route::get('/admin/notices/create',[NoticeController::class,'getAddNotice'])->name('admin.notices.get.create');
Route::post('/admin/notices/create',[NoticeController::class,'postAddNotice'])->name('notices.create');
Route::get('/admin/notices/edit/{id}',[NoticeController::class,'getEditNotice'])->name('admin.notices.get.edit');
Route::post('/admin/notices/edit',[NoticeController::class,'postEditNotice'])->name('notices.edit');
Route::post('/admin/notices/delete',[NoticeController::class,'deleteNotice'])->name('notices.delete');


//Messages
Route::get('/admin/messages',[MessageController::class,'adminShow'])->name('admin.messages.show');
Route::get('/admin/messages/create',[MessageController::class,'getAddMessage'])->name('admin.messages.get.create');
Route::post('/admin/messages/create',[MessageController::class,'postAddMessage'])->name('messages.create');
Route::get('/admin/messages/edit/{id}',[MessageController::class,'getEditMessage'])->name('admin.messages.get.edit');
Route::post('/admin/messages/edit',[MessageController::class,'postEditMessage'])->name('messages.edit');
Route::post('/admin/messages/delete',[MessageController::class,'deleteMessage'])->name('messages.delete');


//sliders
Route::get('/admin/sliders',[SliderController::class,'index'])->name('sliders.get');
Route::post('/admin/sliders/delete',[SliderController::class,'deleteSlider'])->name('sliders.delete');
Route::post('/admin/sliders',[SliderController::class,'postSlider'])->name('sliders.create');

//about
Route::get('/admin/about',[AboutController::class,'adminShow'])->name('admin.about.get');
Route::post('/admin/about',[AboutController::class,'adminPost'])->name('admin.about.post');

//inquiries
Route::get('/admin/inquiry',[InquiryController::class,'all'])->name('admin.inquiry.all');
Route::get('/admin/inquiry/{id}',[InquiryController::class,'show'])->name('admin.inquiry.show');
Route::post('/admin/inquiry/delete',[InquiryController::class,'delete'])->name('inquiry.delete');



//gallery
Route::get('/admin/gallery',[GalleryController::class,'adminShow'])->name('admin.gallery.get');
Route::get('/admin/gallery/create',[GalleryController::class,'create'])->name('admin.gallery.create');
Route::post('/admin/gallery/create',[GalleryController::class,'post'])->name('admin.gallery.post');
Route::get('/admin/gallery/edit/{id}',[GalleryController::class,'getEditGallery'])->name('admin.gallery.get.edit');
Route::put('/admin/gallery/edit/',[GalleryController::class,'postEditGallery'])->name('admin.gallery.post.edit');
Route::post('/admin/gallery/delete',[GalleryController::class,'delete'])->name('admin.gallery.delete');
});