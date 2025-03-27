@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت برندها
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
                    <label>نام فارسی</label>
                    <input type="text" name="persian_name" class="input w-full border mt-2" placeholder="نام فارسی" required>
                </div>
                <div>
                    <label>نام اصلی</label>
                    <input type="text" name="original_name" class="input w-full border mt-2" placeholder="نام اصلی" required>
                </div>
                <div class="mt-3">
                    <div>
                        <label>اسلاگ</label>
                        <input type="text" name="slug" class="input w-full border mt-2" placeholder="اسلاگ">
                    </div>
                    </div>
                <div>
                    <label>لوگو سایت</label>
                    <input type="file" name="logo" class="input w-full border mt-2" required>
                </div>
                <div class="mt-3">
                    <label>وضعیت</label>
                    <div class="mt-2">
                        <input type="checkbox" class="input input--switch border" name="status">
                    </div>
                </div>
                <div class="mt-3">
                    <label>تگ ها</label>
                    <div class="mt-2">
                        <input type="text" name="tags" class="input w-full border mt-2" placeholder="تگ ها">
                    </div>
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