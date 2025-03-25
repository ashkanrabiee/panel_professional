<?php

use Illuminate\Support\Facades\Route;
// admin HomePage
use App\Http\Controllers\Admin\{AdminDashboardController};
// Content Section 



use App\Http\Controllers\Admin\Content\{BannnerController, CategoryController as ContentCategoryController, CommentController as ContentCommentController, FaqController, MenuController, PostController};

//setting
use App\Http\Controllers\Admin\Setting\SettingController;



Route::get('/', function () {
   return view('welcome');
});

//admin
Route::prefix('admin')->group(function(){

      Route::get('/',[AdminDashboardController::class , 'index'])->name('admin.home');
      
                  //contetn secrion start
                  Route::prefix('content')->group(function(){


                  //category
                  Route::prefix('category')->group(function(){
                  Route::get('/',[ContentCategoryController::class , 'index'])->name('admin.content.category.index');
                  Route::get('/create',[ContentCategoryController::class , 'create'])->name('admin.content.category.create');
                  Route::post('/store',[ContentCategoryController::class , 'store'])->name('admin.content.category.store');
                  Route::get('/edit',[ContentCategoryController::class , 'edit'])->name('admin.content.category.edit');
                  Route::patch('/update/{postCategory}',[ContentCategoryController::class , 'update'])->name('admin.content.category.update');
                  Route::delete('/destroy/{postCategory}',[ContentCategoryController::class , 'edit'])->name('admin.content.category.destroy');
                  Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
            });

              //post
                  Route::prefix('post')->group(function(){
                  Route::get('/',[PostController::class , 'index'])->name('admin.content.post.index');
                  Route::get('/create',[PostController::class , 'create'])->name('admin.content.post.create');
                  Route::post('/store',[PostController::class , 'store'])->name('admin.content.post.store');
                  Route::get('/edit',[PostController::class , 'edit'])->name('admin.content.post.edit');
                  Route::patch('/update',[PostController::class , 'update'])->name('admin.content.post.update');
                  Route::delete('/destroy',[PostController::class , 'edit'])->name('admin.content.post.destroy');
                  Route::get('/status', [PostController::class, 'status'])->name('admin.content.post.status');
            });

            //comment
            Route::prefix('comment')->group(function(){
                
                        Route::get('/',[ContentCommentController::class , 'index'])->name('admin.content.comment.index');
                        Route::get('/create',[ContentCommentController::class , 'create'])->name('admin.content.comment.create');
                        Route::post('/store',[ContentCommentController::class , 'store'])->name('admin.content.comment.store');
                        Route::get('/edit',[ContentCommentController::class , 'edit'])->name('admin.content.comment.edit');
                        Route::patch('/update',[ContentCommentController::class , 'update'])->name('admin.content.comment.update');
                        Route::delete('/destroy',[ContentCommentController::class , 'edit'])->name('admin.content.comment.destroy');
                        Route::get('/status', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
            });
            
            //menu 
            Route::prefix('menu')->group(function(){
                
                  Route::get('/',[MenuController::class , 'index'])->name('admin.content.menu.index');
                  Route::get('/create',[MenuController::class , 'create'])->name('admin.content.menu.create');
                  Route::post('/store',[MenuController::class , 'store'])->name('admin.content.menu.store');
                  Route::get('/edit',[MenuController::class , 'edit'])->name('admin.content.menu.edit');
                  Route::patch('/update',[MenuController::class , 'update'])->name('admin.content.menu.update');
                  Route::delete('/destroy',[MenuController::class , 'edit'])->name('admin.content.menu.destroy');
                  Route::get('/status', [MenuController::class, 'status'])->name('admin.content.menu.status');
      });
         //faq 
         Route::prefix('faq')->group(function(){
                
            Route::get('/',[FaqController::class , 'index'])->name('admin.content.faq.index');
            Route::get('/create',[FaqController::class , 'create'])->name('admin.content.faq.create');
            Route::post('/store',[FaqController::class , 'store'])->name('admin.content.faq.store');
            Route::get('/edit',[FaqController::class , 'edit'])->name('admin.content.faq.edit');
            Route::patch('/update',[FaqController::class , 'update'])->name('admin.content.faq.update');
            Route::delete('/destroy',[FaqController::class , 'edit'])->name('admin.content.faq.destroy');
            Route::get('/status', [FaqController::class, 'status'])->name('admin.content.faq.status');
      });
        //banner 
        Route::prefix('banner')->group(function(){
                
            Route::get('/',[BannnerController::class , 'index'])->name('admin.content.banner.index');
            Route::get('/create',[BannnerController::class , 'create'])->name('admin.content.banner.create');
            Route::post('/store',[BannnerController::class , 'store'])->name('admin.content.banner.store');
            Route::get('/edit',[BannnerController::class , 'edit'])->name('admin.content.banner.edit');
            Route::patch('/update',[BannnerController::class , 'update'])->name('admin.content.banner.update');
            Route::delete('/destroy',[BannnerController::class , 'edit'])->name('admin.content.banner.destroy');
            Route::get('/status', [BannnerController::class, 'status'])->name('admin.content.banner.status');
      });



      });
      //content section end 




          Route::prefix('setting')->group(function(){
            Route::get('/',[SettingController::class , 'index'])->name('admin.setting.index');
            Route::get('/create',[SettingController::class , 'create'])->name('admin.setting.create');
            Route::post('/store',[SettingController::class , 'store'])->name('admin.setting.store');
            Route::get('/edit/{postCategory}',[SettingController::class , 'edit'])->name('admin.setting.edit');
            Route::patch('/update/{postCategory}',[SettingController::class , 'update'])->name('admin.setting.update');
      });



      });

  
          




