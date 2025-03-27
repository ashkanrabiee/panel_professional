@extends("panel.layouts.master")
@section("content")
<style>
    .custom-form {
        background: #f8f9fa; /* رنگ پس‌زمینه صفحه */
    }
    
    .form-container {
        width: 100%;
        background: #ffffff;
    }
    
    .form-label {
        margin-bottom: 5px;
        color: #333;
        display: block; /* تضمین می‌کنه لیبل به صورت بلوکی نمایش داده شود */
    }
    
    .form-control {
        border-radius: 8px; /* گوشه‌های گرد */
        border: 1px solid #ccc;
        padding: 10px;
    }
    </style>
    
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت دسته بندی
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
                    <label>نام دسته بندی</label>
                    <input type="text" name="title" class="input w-full border mt-2" placeholder="نام" required>
                </div>
                <div class="mt-3">
                    <label>توضیحات دسته بندی</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="description" required></textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <label>اسلاگ دسته بندی</label>
                    <input type="text" name="slug" class="input w-full border mt-2" placeholder="اسلاگ" required>
                </div>
           
                <div class="mt-3">
                    <label>تصویر دسته بندی</label>
                    <input type="file" name="image" class="input w-full border mt-2" required>
                </div>
                <div class="mt-3">
                    <label>وضعیت</label>
                    <div class="mt-2">
                        <input type="checkbox" class="input input--switch border" name="status">
                    </div>
                </div>
                <div class="mt-3">
                    <label>نشون دادن در دسته بندی</label>
                    <div class="mt-2">
                        <input type="checkbox" class="input input--switch border" name="show_in_menu">
                    </div>
                </div>
                <div class="mb-5 mt-3">
                    <label>تگ ها</label>
                    <input type="text" name="tags" class="input w-full border mt-2" placeholder="تگ ها" required>
                </div>
                <div class="custom-form container-fluid d-flex justify-content-center align-items-center min-vh-100">
                    <div class="form-container p-4 border rounded shadow-sm bg-white" style="max-width:800px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-bold d-block">دسته بندی والد</label>
                                    <select name="brands" class="form-control form-select mt-1">
                                        <option value="" selected="">لطفا انتخاب کن</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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