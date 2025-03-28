@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت پست
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.content.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>نام پست</label>
                        <input type="text" name="title" class="input w-full border mt-2" placeholder="نام پست" required>
                    </div>
                    <div>
                        <label>اسلاگ</label>
                        <input type="text" name="slug" class="input w-full border mt-2" placeholder="اسلاگ" required>
                    </div>
                    <div class="mt-3">
                        <label>تگ‌ها</label>
                        <input type="text" name="tags" id="tags-input" class="input w-full border mt-2" placeholder="تگ‌ها را وارد کنید و Enter بزنید">
                        
                        <div id="tags-container" class="mt-2 flex flex-wrap gap-2"></div>
                    </div>
                    <div class="mt-2"> 
                        <label>دسته‌بندی</label>
                        <select name="category_id" class="select2 w-full">
                            <option>--- دسته‌بندی مورد نظر خود را انتخاب کنید ---</option>
                            @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>بدنه پست</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" required></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>خلاصه</label>
                        <div class="mt-2">
                            <textarea id="summary" name="summary" required></textarea>
                        </div>
                    </div>
                    <div>
                        <label>تصویر پست</label>
                        <input type="file" name="image" class="input w-full border mt-2" required>
                    </div>
                    <div>
                        <div class="mt-3">
                            <label>وضعیت</label>
                            <div class="mt-2">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" class="input input--switch border" name="status" value="1">
                                
                            </div>
                        </div>
                        <label>باز و بسته بودن کامنت</label>
                        <div class="mt-2">
                            <input type="hidden" name="commentable" value="0">
                            <input type="checkbox" class="input input--switch border" name="commentable" value="1">
                            
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="button w-24 bg-theme-1 text-white">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>

<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
    CKEDITOR.replace('summary');
</script>

@endsection
