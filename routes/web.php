<?php

use Illuminate\Support\Facades\Route;
// admin HomePage
use App\Http\Controllers\Admin\{AdminDashboardController};
// Content Section 



use App\Http\Controllers\Admin\Content\{BannnerController, CategoryController as ContentCategoryController, CommentController as ContentCommentController, FaqController, MenuController, PostController};
//Market section
use App\Http\Controllers\Admin\Market\{OrderController,StoreController,GalleryController,PaymentController,ProductController,DiscountController,PropertyController,GuaranteeController,ProductColorController ,PropertyValueController,BrandController, CategoryController as MarketCategoryController, CommentController as MarketCommentController, DeliveryController};

//setting
use App\Http\Controllers\Admin\Setting\SettingController;




Route::get('/', function () {
   return view('welcome');
});


//admin
Route::prefix('admin')->group(function(){

      Route::get('/',[AdminDashboardController::class , 'index'])->name('admin.home');
      

                  //market section start 
                  Route::prefix('market')->group(function(){

                        //category
                        Route::prefix('category')->group(function(){
                              Route::get('/' ,[MarketCategoryController::class , 'index'])->name('admin.market.category.index');
                              Route::get('/create' ,[MarketCategoryController::class , 'create'])->name('admin.market.category.create');
                              Route::post('/store' ,[MarketCategoryController::class , 'store'])->name('admin.market.category.store');
                              Route::get('/show' ,[MarketCategoryController::class , 'show'])->name('admin.market.category.show');
                              Route::get('/edit' ,[MarketCategoryController::class , 'edit'])->name('admin.market.category.edit');
                              Route::put('/update' ,[MarketCategoryController::class , 'update'])->name('admin.market.category.update');
                              Route::delete('/destroy' ,[MarketCategoryController::class , 'destroy'])->name('admin.market.category.destroy');
                              Route::get('/status' ,[MarketCategoryController::class , 'status'])->name('admin.market.category.status');
                        });

                         //brand
                         Route::prefix('brand')->group(function(){
                              Route::get('/' ,[BrandController::class , 'index'])->name('admin.market.brand.index');
                              Route::get('/create' ,[BrandController::class , 'create'])->name('admin.market.brand.create');
                              Route::post('/store' ,[BrandController::class , 'store'])->name('admin.market.brand.store');
                              Route::get('/show' ,[BrandController::class , 'show'])->name('admin.market.brand.show');
                              Route::get('/edit' ,[BrandController::class , 'edit'])->name('admin.market.brand.edit');
                              Route::put('/update' ,[BrandController::class , 'update'])->name('admin.market.brand.update');
                              Route::delete('/destroy' ,[BrandController::class , 'destroy'])->name('admin.market.brand.destroy');
                              Route::get('/status' ,[BrandController::class , 'status'])->name('admin.market.brand.status');
                        });
                        
                         //comment
                         Route::prefix('comment')->group(function(){
                              Route::get('/' ,[MarketCategoryController::class , 'index'])->name('admin.market.comment.index');
                              Route::get('/create' ,[MarketCategoryController::class , 'create'])->name('admin.market.comment.create');
                              Route::post('/store' ,[MarketCategoryController::class , 'store'])->name('admin.market.comment.store');
                              Route::get('/show' ,[MarketCategoryController::class , 'show'])->name('admin.market.comment.show');
                              Route::get('/edit' ,[MarketCategoryController::class , 'edit'])->name('admin.market.comment.edit');
                              Route::put('/update' ,[MarketCategoryController::class , 'update'])->name('admin.market.comment.update');
                              Route::delete('/destroy',[MarketCategoryController::class , 'destroy'])->name('admin.market.comment.destroy');
                              Route::get('/status' ,[MarketCategoryController::class , 'status'])->name('admin.market.comment.status');
                        });
                         //delivery
                         Route::prefix('delivery')->group(function(){
                              Route::get('/' ,[DeliveryController::class , 'index'])->name('admin.market.delivery.index');
                              Route::get('/create' ,[DeliveryController::class , 'create'])->name('admin.market.delivery.create');
                              Route::post('/store' ,[DeliveryController::class , 'store'])->name('admin.market.delivery.store');
                              Route::get('/show' ,[DeliveryController::class , 'show'])->name('admin.market.delivery.show');
                              Route::get('/edit' ,[DeliveryController::class , 'edit'])->name('admin.market.delivery.edit');
                              Route::put('/update' ,[DeliveryController::class , 'update'])->name('admin.market.delivery.update');
                              Route::delete('/destroy' ,[DeliveryController::class , 'destroy'])->name('admin.market.delivery.destroy');
                              Route::get('/status' ,[DeliveryController::class , 'status'])->name('admin.market.delivery.status');
                        });
                        //       //discount
                        //       Route::prefix('discount')->group(function () {
                        //       Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
                        //       Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
                        //       Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
                        //       Route::post('/common-discount/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.market.discount.commonDiscount.store');
                        //       Route::get('/common-discount/edit/{commonDiscount}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.market.discount.commonDiscount.edit');
                        //       Route::put('/common-discount/update/{commonDiscount}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.market.discount.commonDiscount.update');
                        //       Route::delete('/common-discount/destroy/{commonDiscount}', [DiscountController::class, 'commonDiscountDestroy'])->name('admin.market.discount.commonDiscount.destroy');
                        //       Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscount.create');
                        //       Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
                        //       Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
                        //       Route::post('/amazing-sale/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSale.store');
                        //       Route::get('/amazing-sale/edit/{amazingSale}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSale.edit');
                        //       Route::put('/amazing-sale/update/{amazingSale}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSale.update');
                        //       Route::delete('/amazing-sale/destroy/{amazingSale}', [DiscountController::class, 'amazingSaleDestroy'])->name('admin.market.discount.amazingSale.destroy');
                        //       Route::post('/copan/store', [DiscountController::class, 'copanStore'])->name('admin.market.discount.copan.store');
                        //       Route::get('/copan/edit/{copan}', [DiscountController::class, 'copanEdit'])->name('admin.market.discount.copan.edit');
                        //       Route::put('/copan/update/{copan}', [DiscountController::class, 'copanUpdate'])->name('admin.market.discount.copan.update');
                        //       Route::delete('/copan/destroy/{copan}', [DiscountController::class, 'copanDestroy'])->name('admin.market.discount.copan.destroy');

                        //   });

                        //order
                        Route::prefix('order')->group(function () {
                        Route::get('/', [OrderController::class, 'all'])->name('admin.market.order.all');
                        Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.newOrders');
                        Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
                        Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
                        Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
                        Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
                        Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.market.order.show');
                        Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.market.order.show.detail');
                        Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
                        Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
                        Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
                  });
                  

                        //payment
                        Route::prefix('payment')->group(function () {
                        Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
                        Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
                        Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
                        Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
                        Route::get('/canceled', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
                        Route::get('/returned', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
                        Route::get('/show', [PaymentController::class, 'show'])->name('admin.market.payment.show');
                  });

                    //product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.market.product.update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');

            //gallery
            Route::get('/gallery/{product}', [GalleryController::class, 'index'])->name('admin.market.gallery.index');
            Route::get('/gallery/create/{product}', [GalleryController::class, 'create'])->name('admin.market.gallery.create');
            Route::post('/gallery/store/{product}', [GalleryController::class, 'store'])->name('admin.market.gallery.store');
            Route::delete('/gallery/destroy/{product}/{gallery}', [GalleryController::class, 'destroy'])->name('admin.market.gallery.destroy');

            //color
            Route::get('/color/{product}', [ProductColorController::class, 'index'])->name('admin.market.color.index');
            Route::get('/color/create/{product}', [ProductColorController::class, 'create'])->name('admin.market.color.create');
            Route::post('/color/store/{product}', [ProductColorController::class, 'store'])->name('admin.market.color.store');
            Route::delete('/color/destroy/{product}/{color}', [ProductColorController::class, 'destroy'])->name('admin.market.color.destroy');

            //guarantee
            Route::get('/guarantee/{product}', [GuaranteeController::class, 'index'])->name('admin.market.guarantee.index');
            Route::get('/guarantee/create/{product}', [GuaranteeController::class, 'create'])->name('admin.market.guarantee.create');
            Route::post('/guarantee/store/{product}', [GuaranteeController::class, 'store'])->name('admin.market.guarantee.store');
            Route::delete('/guarantee/destroy/{product}/{guarantee}', [GuaranteeController::class, 'destroy'])->name('admin.market.guarantee.destroy');
        });
         //property
         Route::prefix('property')->group(function () {
            Route::get('/', [PropertyController::class, 'index'])->name('admin.market.property.index');
            Route::get('/create', [PropertyController::class, 'create'])->name('admin.market.property.create');
            Route::post('/store', [PropertyController::class, 'store'])->name('admin.market.property.store');
            Route::get('/edit/{categoryAttribute}', [PropertyController::class, 'edit'])->name('admin.market.property.edit');
            Route::put('/update/{categoryAttribute}', [PropertyController::class, 'update'])->name('admin.market.property.update');
            Route::delete('/destroy/{categoryAttribute}', [PropertyController::class, 'destroy'])->name('admin.market.property.destroy');

            //value
            Route::get('/value/{categoryAttribute}', [PropertyValueController::class, 'index'])->name('admin.market.value.index');
            Route::get('/value/create/{categoryAttribute}', [PropertyValueController::class, 'create'])->name('admin.market.value.create');
            Route::post('/value/store/{categoryAttribute}', [PropertyValueController::class, 'store'])->name('admin.market.value.store');
            Route::get('/value/edit/{categoryAttribute}/{value}', [PropertyValueController::class, 'edit'])->name('admin.market.value.edit');
            Route::put('/value/update/{categoryAttribute}/{value}', [PropertyValueController::class, 'update'])->name('admin.market.value.update');
            Route::delete('/value/destroy/{categoryAttribute}/{value}', [PropertyValueController::class, 'destroy'])->name('admin.market.value.destroy');
        });
        //store
        Route::prefix('store')->group(function () {
            Route::get('/', [StoreController::class, 'index'])->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', [StoreController::class, 'addToStore'])->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', [StoreController::class, 'store'])->name('admin.market.store.store');
            Route::get('/edit/{product}', [StoreController::class, 'edit'])->name('admin.market.store.edit');
            Route::put('/update/{product}', [StoreController::class, 'update'])->name('admin.market.store.update');
        });


                  });



                  //market section end





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
            Route::post('/store',[SettingController::class , 'store'])->name('admin.setting.store');
      });



      });

  
          




