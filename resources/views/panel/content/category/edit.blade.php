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
        ویرایش دسته بندی
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
       
            <div class="intro-y box p-5">
                <form action="{{route("admin.content.category.update",$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                <div>
                    <label>نام دسته بندی</label>
                    <input type="text" name="name" class="input w-full border mt-2" placeholder="نام" value="{{$category->name}}" required>
                </div>
                <div class="mt-3">
                    <label>توضیحات دسته بندی</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" id="body" name="description" required>{{$category->description}}</textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <label>اسلاگ دسته بندی</label>
                    <input type="text" name="slug" class="input w-full border mt-2" value="{{$category->slug}}" placeholder="اسلاگ" required>
                </div>
           
                <div class="mt-3">
                    <label>تصویر دسته بندی</label>
                    <input type="file" name="image" class="input w-full border mt-2">
                </div>
                <div class="mt-3">
                    <div class="mt-2">
                        <label>وضعیت</label>
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" class="input input--switch border" name="status"  @if ($category->status == 1)
                        checked
                    @endif  value="1">
                    </div>
                </div>
           
                <div class="mb-5 mt-3">
                    <label>تگ ها</label>
                    <input type="text" name="tags" class="input w-full border mt-2" placeholder="تگ ها" value="{{$category->tags}}" required>
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
    CKEDITOR.replace('body');
</script>
@endsection