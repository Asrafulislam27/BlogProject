<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Auth::routes();

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('categories/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewcategory']);
Route::get('categories/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'showsinglepost']);
Route::get('tags/{category_slug}/{post_slug}/{id}',[App\Http\Controllers\Frontend\FrontendController::class,'viewtag']);

//About Route
Route::get('/about-us',[App\Http\Controllers\Frontend\FrontendController::class,'about'])->name('about-us');

//Contact Route
Route::get('/contact-us',[App\Http\Controllers\Frontend\FrontendController::class,'contact'])->name('contact-us');
Route::get('/send/message',[App\Http\Controllers\Frontend\ContactMailController::class,'mail'])->name('send.message');

//Privacy & Policy
Route::get('/privacy-policy',[App\Http\Controllers\Frontend\FrontendController::class,'privacy'])->name('privacy-policy');

//Privacy & Policy
Route::get('/terms-of-Use',[App\Http\Controllers\Frontend\FrontendController::class,'terms'])->name('terms-of-Use');

//Comment Route
Route::post('/comments',[App\Http\Controllers\Frontend\CommentController::class,'store']);
Route::post('/delete-comment',[App\Http\Controllers\Frontend\CommentController::class,'destroy']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//All Admin Router Setting

Route::prefix('admin')->middleware('auth','is_Admin')->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Profile Setting
    Route::get('/profile',[App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/edit/profile',[App\Http\Controllers\Admin\DashboardController::class, 'edit'])->name('edit.profile');
    Route::post('/store/profile',[App\Http\Controllers\Admin\DashboardController::class, 'storeProfile'])->name('store.profile');

    //Password Change
    Route::get('/change/password',[App\Http\Controllers\Admin\DashboardController::class, 'changepassword'])->name('change.password');
    Route::post('/update/password',[App\Http\Controllers\Admin\DashboardController::class, 'updatepassword'])->name('update.password');

    //Category Function
    Route::get('/category',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/add-category',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.add-category');
    Route::post('/store/add-category',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.store.add-category');
    Route::get('/edit-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.edit-category');
    Route::patch('/update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.update-category');
    Route::get('/delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.delete-category');
    
    //Tag Function
    Route::get('/tag',[App\Http\Controllers\Admin\TagController::class, 'index'])->name('admin.tag');
    Route::get('/add-tag',[App\Http\Controllers\Admin\TagController::class, 'create'])->name('admin.add-tag');
    Route::post('/add-tag',[App\Http\Controllers\Admin\TagController::class, 'store'])->name('admin.store.add-tag');
    Route::get('/edit-tag/{tag_id}',[App\Http\Controllers\Admin\TagController::class, 'edit'])->name('admin.edit-tag');
    Route::patch('/update-tag/{tag_id}',[App\Http\Controllers\Admin\TagController::class, 'update'])->name('admin.update-tag');
    Route::get('/delete-tag/{tag_id}',[App\Http\Controllers\Admin\TagController::class, 'destory'])->name('admin.delete-tag');


    //Post Function
    Route::get('/posts',[App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts');
    Route::get('/add-post',[App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.add-post');
    Route::post('/add-post',[App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.store.add-post');
    Route::get('/edit-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.edit-post');
    Route::patch('/update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.update-post');
    Route::get('/delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.delete-post');

    //User Role
    Route::get('/users',[App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
    Route::get('/edit/{user_id}',[App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::patch('/update/{user_id}',[App\Http\Controllers\Admin\UserController::class, 'update']);

    //Setting
    Route::get('/setting',[App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.setting');
    Route::patch('/setting/update',[App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.setting.update');

    //About
    Route::get('/about-us',[App\Http\Controllers\Admin\AboutController::class, 'index'])->name('admin.about-us');
    Route::patch('/about-us/update',[App\Http\Controllers\Admin\AboutController::class, 'update'])->name('admin.about-us.update');

    //Privacy
    Route::get('/privacy',[App\Http\Controllers\Admin\PrivacyController::class, 'index'])->name('admin.privacy');
    Route::patch('/privacy/update',[App\Http\Controllers\Admin\PrivacyController::class, 'update'])->name('admin.privacy.update');

    //Terms Of Use
    Route::get('/terms-Use',[App\Http\Controllers\Admin\TermsUseController::class, 'terms'])->name('admin.terms-Use');
    Route::patch('/terms-Use/update',[App\Http\Controllers\Admin\TermsUseController::class, 'update'])->name('admin.terms-Use.update');

});
