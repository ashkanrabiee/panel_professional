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
      ویرایش
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.market.category.update' ,$productCategory->id) }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name">نام دسته بندی</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $productCategory->name) }}" class="input w-full border mt-2" placeholder="نام" required>
                    </div>

                    <!-- توضیحات دسته بندی -->
                    <div class="mb-4">
                        <label for="description">توضیحات دسته بندی</label>
                        <textarea name="description" id="description" class="input w-full border mt-2" required>   {{ old('description', $productCategory->description) }}</textarea>
                    </div>

                    <!-- تصویر دسته بندی -->
                    <div class="mb-4">
                        <label for="image">تصویر دسته بندی</label>
                        <input type="file" name="image" id="image" class="input w-full border mt-2" required>
                    </div>

                    <!-- منو والد -->
                    <div class="mb-4">
                        <label for="parent_id">منو والد</label>
                        <select name="parent_id" id="parent_id" class="form-control form-control-sm w-full border mt-2">
                            <option value="">منوی اصلی</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(old('parent_id') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- وضعیت -->
                    <div class="mb-4">
                        <label for="status">وضعیت</label>
                        <select name="status" id="status" class="form-control form-control-sm w-full border mt-2">
                            <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                            <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                        </select>
                        @error('status')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- نمایش در منو -->
                    <div class="mb-4">
                        <label for="show_in_menu">نمایش در منو</label>
                        <select name="show_in_menu" id="show_in_menu" class="form-control form-control-sm w-full border mt-2">
                            <option value="0" @if(old('show_in_menu') == 0) selected @endif>غیرفعال</option>
                            <option value="1" @if(old('show_in_menu') == 1) selected @endif>فعال</option>
                        </select>
                        @error('show_in_menu')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- تگ ها -->
                    <div class="mb-5 mt-4">
                        <label for="tags">تگ ها</label>
                        <input type="hidden" name="tags" id="tags" value="{{ old('tags') }}">
                        <select class="select2 form-control form-control-sm w-full border mt-2" id="select_tags" multiple>
                            <!-- Options for tags will be dynamically inserted here -->
                        </select>
                        @error('tags')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- دکمه ذخیره -->
                    <div class="text-right mt-5">
                        <button type="submit" class="button w-24 bg-theme-1 text-white">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>




@endsection
@section('script')
<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function () {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = null;

        if(tags_input.val() !== null && tags_input.val().length > 0)
        {
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder : 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data
        });
        select_tags.children('option').attr('selected', true).trigger('change');


        $('#form').submit(function ( event ){
            if(select_tags.val() !== null && select_tags.val().length > 0){
                var selectedSource = select_tags.val().join(',');
                tags_input.val(selectedSource)
            }
        })
    })
</script>
    
@endsection

