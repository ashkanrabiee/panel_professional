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
                    <input type="text" name="title" class="input w-full border mt-2" placeholder="نام سایت" required>
                </div>
                <div>
                    <label>کلمات کلیدی</label>
                    <input type="text" name="keywords" class="input w-full border mt-2" placeholder="کلمات کلیدی" required>
                </div>
                <div class="mt-3">
                    <label>توضیحات سایت</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="description" required></textarea>
                    </div>
                </div>
                <div>
                    <label>لوگو سایت</label>
                    <input type="file" name="logo" class="input w-full border mt-2" required>
                </div>
                <div>
                    <label>آیکون سایت</label>
                    <input type="file" name="icon" class="input w-full border mt-2" required>
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

@endsection