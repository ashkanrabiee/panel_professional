@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
       ساخت فرم کالا
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen p-6 bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <!-- BEGIN: Form Layout -->
        <form  action="{{ route('admin.market.property.store') }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-gray-700">نام فرم</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">واحد اندازه گیری</label>
                <input type="text"  name="unit" value="{{ old('unit') }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">انتخاب دسته</label>
                <select name="category_id"  class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">دسته را انتخاب کنید</option>
                    @foreach ($productCategories as $productCategory)
                    <option value="{{ $productCategory->id }}" @if(old('category_id') == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                    @endforeach
                </select>
                @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

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