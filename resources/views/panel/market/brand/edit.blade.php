@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ویرایش
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen p-6 bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <!-- BEGIN: Form Layout -->
        <form id="form" action="{{ route('admin.market.brand.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-gray-700">نام اصلی برند</label>
                <input type="text" name="original_name" name="original_name" value="{{ old('original_name', $brand->original_name) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">نام فارسی برند</label>
                <input type="text"  name="persian_name" value="{{ old('persian_name', $brand->persian_name) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">تگ‌ها</label>
                <select name="tags[]" id="select_tags" class="w-full p-2 border border-gray-300 rounded-md" multiple></select>
                <input type="hidden" id="tags" name="tags" value="{{ old('tags') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">وضعیت</label>
                <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                </select>
                @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">تصویر دسته‌بندی</label>
                <input type="file" name="logo" id="logo" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <section class="row">
                @php
                    $number = 1;
                    @endphp
                @foreach ($brand->logo['indexArray'] as $key => $value )
                <section class="col-md-{{ 6 / $number }}">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="currentImage" value="{{ $key }}" id="{{ $number }}" @if($brand->logo['currentImage'] == $key) checked @endif>
                        <label for="{{ $number }}" class="form-check-label mx-2">
                            <img src="{{ asset($value) }}" class="w-100" alt="">
                        </label>
                    </div>
                </section>
                @php
                $number++;
            @endphp
                @endforeach

            </section>
            <div class="text-right mt-5">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">ذخیره</button>
            </div>
        </form>
        <!-- END: Form Layout -->
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
            var default_data = [];

            if (default_tags.length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ‌های خود را وارد نمایید',
                tags: true,
                data: default_data
            });

            select_tags.val(default_data).trigger('change');

            $('#form').submit(function () {
                var selectedTags = select_tags.val();
                if (selectedTags) {
                    tags_input.val(selectedTags.join(','));
                }
            });
        });
    </script>
@endsection