<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\FeaturedNewController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BlogController::class, 'index'])->name('home');
Route::get('/single-page/{slug}',[BlogController::class, 'single_page'])->name('single.blog');
Route::get('tag/{slug}',[BlogController::class, 'filterTag'])->name('single.tag');
Route::get('category/{slug}',[BlogController::class, 'filterCategory'])->name('filter.category');
Route::get('news/{slug}',[BlogController::class,'filterSlider'])->name('single.slider');
Route::get('featured/news/{slug}',[BlogController::class,'filterFeaturedNews'])->name('featured.news');

// comment route
Route::post('post/comment/{postId}',[CommentController::class,'comment'])->name('post.comment')->middleware('auth');
Route::post('comment/reply',[CommentController::class,'commentReplay'])->name('comment.reply')->middleware('auth');
Route::post('comment/delete',[CommentController::class,'commentDelete'])->name('comment.delete')->middleware('auth');
Route::post('comment/reply/delete',[CommentController::class,'commentReplyDelete'])->name('comment.reply.delete')->middleware('auth');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user route
    Route::resource('user',UserController::class);
    
    // category route
    Route::resource('category',CategoryController::class);

    // post route
    Route::resource('posts',PostController::class);

    // slider route
    Route::resource('slider',SliderController::class);

    // featured news route
    Route::resource('featuredNews',FeaturedNewController::class);

    // tag route
    Route::resource('tags',TagController::class);

    // widgets view call
    Route::view('widgets','admin.widgets.all_widgets')->name('widget');

    // setting view call
    Route::get('setting',[SettingController::class,'show'])->name('setting');
   
    // store setting data route
    Route::post('setting-save', [SettingController::class, 'saveOrUpdate'])->name('setting.save');
    
});

require __DIR__.'/auth.php';
