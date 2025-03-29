@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        تنظیمات کلی سایت
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{route("admin.setting.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div>
                    <label>نام سایت</label>
                    <input type="text" name="title" class="input w-full border mt-2" value="{{$setting->title}}" placeholder="نام سایت" >
                </div>
                <div>
                    <label>کلمات کلیدی</label>
                    <input type="text" name="keywords" class="input w-full border mt-2" value="{{$setting->keywords}}" placeholder="کلمات کلیدی" >
                </div>
                     <div class="mt-3">
                        <label>خلاصه</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" required></textarea>
                        </div>
                    </div>
<hr class="mt-8 mb-5">

                <div>
                    <label>لوگو سایت</label>
                    <img src="{{asset($setting->logo)}}" width="200" alt="">
                    <input type="file" name="logo" class="input w-full border mt-2" >
                </div>
<hr class="mt-8 mb-5">
                <div>
                    <label>آیکون سایت</label>
                    <img src="{{asset($setting->icon)}}" width="200" alt="">

                    <input type="file" name="icon" class="input w-full border mt-2" >
                </div>

                <div class="text-right mt-5">
                
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>

<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
    
</script>
@endsection