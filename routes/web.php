<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminDashboardController};
// Content Section 
use App\Http\Controllers\Admin\Content\{CategoryController as ContentCategoryController, PostController};
use App\Http\Controllers\Admin\setting\SettingController;



Route::get('/', function () {
   return view('welcome');
});


Route::prefix('admin')->group(function(){

      Route::get('/',[AdminDashboardController::class , 'index'])->name('admin.home');
      
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

                  

            });


      });

          Route::prefix('setting')->group(function(){
            Route::get('/',[SettingController::class , 'index'])->name('admin.setting.index');
            Route::get('/create',[SettingController::class , 'create'])->name('admin.setting.create');
            Route::post('/store',[SettingController::class , 'store'])->name('admin.setting.store');
            Route::get('/edit/{postCategory}',[SettingController::class , 'edit'])->name('admin.setting.edit');
            Route::patch('/update/{postCategory}',[SettingController::class , 'update'])->name('admin.setting.update');
      });






      });

  

          




