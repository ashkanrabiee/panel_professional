@extends("panel.layouts.master")
@section('head-tag')
<link rel="stylesheet" href="{{ asset('panel-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection


@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت برندها
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen p-6 bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <form id="form" action="{{ route('admin.market.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <!-- نام کالا -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">نام کالا</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            
            <!-- انتخاب دسته -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">انتخاب دسته</label>
                <select name="category_id" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">دسته را انتخاب کنید</option>
                    @foreach ($productCategories as $productCategory)
                    <option value="{{ $productCategory->id }}" @if(old('category_id') == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- انتخاب برند -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">انتخاب برند</label>
                <select name="brand_id" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">برند را انتخاب کنید</option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected @endif>{{ $brand->original_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- تصویر -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">تصویر</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            
            <!-- مشخصات کالا -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700">وزن</label>
                    <input type="text" name="weight" value="{{ old('weight') }}"  class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">طول</label>
                    <input type="text" name="length" value="{{ old('length') }}" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">عرض</label>
                    <input type="text" name="width" value="{{ old('width') }}" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">ارتفاع</label>
                    <input type="text" name="height" value="{{ old('height') }}" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
            </div>
            
            <!-- قیمت کالا -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">قیمت کالا</label>
                <input type="text" name="price" value="{{ old('price') }}" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-5 mt-4">
                <label for="tags">تگ‌ها</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags') }}" class="form-control w-full mt-2" placeholder="تگ‌ها را وارد کنید و با کاما جدا کنید">
                @error('tags')
                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
         
            <div class="mb-4">
                <label for="description">توضیحات دسته بندی</label>
                <textarea name="introduction" id="introduction" class="input w-full border mt-2" required>{{ old('introduction') }}</textarea>
            </div>

          
            <div class="mb-4">
                <label class="block font-medium text-gray-700" for="published_at_view">تاریخ انتشار</label>
                <input type="date" id="published_at_view" class="w-full p-2 border border-gray-300 rounded-md" name="published_at" value="{{ old('published_at') }}" required>
            </div>
           

            <div class="mt-3">
                <label> وضعیت </label>
                <div class="mt-2">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" class="input input--switch border" {{ old('status', $status ?? 0) == 1 ? 'checked' : '' }}>
                       </div>
            </div>

            <div class="mt-3">
                <label> قابل فروش بودن </label>
                <div class="mt-2">
                    <input type="hidden" name="marketable" value="0">
                    <input type="checkbox" name="marketable" value="1" class="input input--switch border" {{ old('marketable', $status ?? 0) == 1 ? 'checked' : '' }}>
                </div>
            </div>
           
           
            {{-- <div class="mb-4">
                <label class="block font-medium text-gray-700">ویژگی‌ها</label>
                <div id="meta-fields-container" class="grid grid-cols-2 gap-4">
                    <div class="meta-field flex items-center gap-4">
                        <input type="text" name="meta_key[]" class="w-full p-2 border border-gray-300 rounded-md" placeholder="ویژگی ...">
                        <input type="text" name="meta_value[]" class="w-full p-2 border border-gray-300 rounded-md" placeholder="مقدار ...">
                    </div>
                </div>
                <button type="button" id="btn-copy" class="mt-2 bg-green-500 text-white py-1 px-3 rounded-md hover:bg-green-600">افزودن</button>
            </div>
             --}}

            
            <!-- دکمه ارسال -->
            <div class="text-right mt-5">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">ذخیره</button>
            </div> 
        </form>
    </div>
</div>


@endsection

@section('script')
<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('panel-asset/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('panel-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    CKEDITOR.replace('introduction');
</script>

<script>
    $(document).ready(function() {
        // اطمینان از اینکه فایل jQuery قبل از این اسکریپت بارگذاری شده باشد
        $('#published_at_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#published_at'
        });
    });
</script>


<script>
  document.getElementById('btn-copy').addEventListener('click', function() {
    var container = document.getElementById('meta-fields-container');
    
    var newField = document.createElement('div');
    newField.classList.add('meta-field', 'flex', 'items-center', 'gap-4');
    
    newField.innerHTML = `
        <input type="text" name="meta_key[]" class="w-full p-2 border border-gray-300 rounded-md" placeholder="ویژگی ...">
        <input type="text" name="meta_value[]" class="w-full p-2 border border-gray-300 rounded-md" placeholder="مقدار ...">
    `;
    
    container.appendChild(newField);
});

$(document).ready(function () {
    $('#form').submit(function (event) {
        // این بخش برای جمع‌آوری داده‌های فیلدهای meta_key و meta_value است
        var metaKeys = [];
        var metaValues = [];
        
        // گرفتن مقادیر از تمام فیلدهای meta_key و meta_value
        $("input[name='meta_key[]']").each(function() {
            metaKeys.push($(this).val());
        });
        
        $("input[name='meta_value[]']").each(function() {
            metaValues.push($(this).val());
        });

        // اضافه کردن مقادیر meta_key و meta_value به ورودی‌های فرم قبل از ارسال
        // در اینجا نیازی به انجام کاری اضافی نیست چون به طور خودکار از طریق نام `meta_key[]` و `meta_value[]` ارسال می‌شوند.
    });
});

</script>
<script>
    $(document).ready(function () {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = [];

        // اگر تگ‌های پیش‌فرض موجود باشند
        if (default_tags.length > 0) {
            default_data = default_tags.split(',').map(function(tag) {
                return { id: tag, text: tag }; // تبدیل به فرمت مناسب برای select2
            });
        }

        // راه‌اندازی select2
        select_tags.select2({
            placeholder: 'لطفا تگ‌های خود را وارد نمایید',
            tags: true,
            data: default_data
        });

        // انتخاب تگ‌ها به صورت پیش‌فرض
        select_tags.val(default_data.map(function(tag) { return tag.id; })).trigger('change');

        // ارسال داده‌ها به input مخفی در هنگام ارسال فرم
        $('#form').submit(function (event) {
            var selectedTags = select_tags.val();
            if (selectedTags) {
                tags_input.val(selectedTags.join(',')); // تبدیل به رشته و قرار دادن در input مخفی
            }
        });
    });
</script>


@endsection