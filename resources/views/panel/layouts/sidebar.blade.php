<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('panel-asset/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route("admin.home")}}" class="side-menu @if (Route::is('admin.home')
            )
                side-menu--active 
            @endif">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> داشبورد </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu @if (
            Route::is('admin.market.category.index') ||
            Route::is('admin.market.category.create') ||
            Route::is('admin.market.product.index') ||
            Route::is('admin.market.product.create') ||
            Route::is('admin.market.brand.index') ||
            Route::is('admin.market.brand.create') ||
            Route::is('admin.market.store.index') ||
            Route::is('admin.market.comment.index') 
            )
                side-menu--active side-menu--open
            @endif">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> ویترین <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul @if (
            Route::is('admin.market.category.index') ||
            Route::is('admin.market.category.create') ||
            Route::is('admin.market.product.index') ||
            Route::is('admin.market.product.create') ||
            Route::is('admin.market.brand.index') ||
            Route::is('admin.market.store.index') ||
            Route::is('admin.market.comment.index') 
            )
                class="side-menu__sub-open" style="display: block">
            @endif
                <li>
                    <a href="{{route("admin.market.category.index")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">دسته بندی</div>
                    </a>
                </li>
                <li>
                    <a href="{{route("admin.market.property.index")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> فرم کالا</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.market.brand.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> برند ها </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.market.product.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> کالاها </div>
                    </a>
                </li>
                <li>
                    <a href="{{route("admin.market.store.index")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> انبار </div>
                    </a>
                </li>
                <li>
                    <a href="{{route("admin.market.comment.index")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> نظرات </div>
                    </a>
                </li>
            </ul>
        </li>

       
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> سفارشات<i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route("admin.market.order.all")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> سفارش جدید</div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> درحال ارسال  </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  پرداخت نشده</div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> باطل شده </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> مرجوعی</div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> تمام سفارشات</div>
                    </a>
                </li>
            </ul>
        </li>



        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> پرداخت ها <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  تمام پرداخت ها  </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  پرداخت انلاین </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  پرداخت آفلاین </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> پرداخت در محل </div>
                    </a>
                </li>
              
            </ul>
        </li>



        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> نخفیف ها  <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> کد تخفیف  </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> کپن تخفیف </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> نخفیف عمومی  </div>
                    </a>
                </li>
                    <a href="top-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> فروش شگفت انگیز </div>
                    </a>
                </li>

            </ul>
        </li>
    <li>
            <a href="{{route("admin.market.delivery.index")}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> روش ارسال</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>


        <li>
            <a href="javascript:;" class="side-menu @if (Route::is('admin.content.category.index') ||
            Route::is('admin.content.post.index') ||
            Route::is('admin.content.comment.index') ||
            Route::is('admin.content.menu.index') ||
            Route::is('admin.content.faq.index') ||
            Route::is('admin.content.banner.index') 
            )
                side-menu--active side-menu--open
            @endif">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> بخش محتوا <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul @if (Route::is('admin.content.category.index') ||
            Route::is('admin.content.post.index') ||
            Route::is('admin.content.comment.index') ||
            Route::is('admin.content.menu.index') ||
            Route::is('admin.content.faq.index') ||
            Route::is('admin.content.banner.index') 
            )
                class="side-menu__sub-open" style="display: block">
            @endif 
                            <li>
                    <a href="{{ route('admin.content.category.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> دسته بندی </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.post.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> پست ها  </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.comment.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> نظرات </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.menu.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> منو ها </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.faq.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  سوالات متداول </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.banner.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> بنرها </div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="side-nav__devider my-6"></li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> بخش کاربران <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">کاربران ادمین</div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> بخش کاربران </div>
                    </a>
                </li>
         
              
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> سطوح دسترسی <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route("admin.user.role.index")}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> مدیریت نقش ها </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> مدیریت دسترسی ها </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> فروش شگفت انگیز </div>
                    </a>
                </li>
              
            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>





        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> تیکت ها <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> دسته بندی تیکت ها </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> اولویت تیکت ها </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> ادمین تیکت ها </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> تیکت های جدید </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> تیکت های باز </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> تیکت های بسته </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> همه تیکت ها </div>
                    </a>
                </li>
              
              
            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>



        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> اطلاع رسانی <i data-feather="chevron-down" class="side-menu__sub-icon">
                    </i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">اطلاعیه ایمیل </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> اطلاعات پیامکی </div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>



        <li>
            <a href="{{route("admin.setting.index")}}" class="side-menu @if (Route::is('admin.setting.index'))
                side-menu--active
            @endif">
                <div class="side-menu__icon"> <i data-feather="activity"></i>  </div>
                <div class="side-menu__title"> تنظیمات  </div>
            </a>
          
        </li>

        <li class="side-nav__devider my-6"></li>




      
      
      
      
    </ul>
</nav>