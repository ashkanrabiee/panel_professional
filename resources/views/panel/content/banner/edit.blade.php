@extends('panel.layouts.master')

@section('head-tag')
    <title> بنر ها</title>
@endsection


@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ویرایش بنر
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.content.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium">عنوان بنر</label>
                        <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="input w-full border mt-2 p-2" placeholder="عنوان بنر را وارد کنید">
                        @error('title')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">تصویر</label>
                        <input type="file" name="image" class="input w-full border mt-2 p-2" required>
                        @error('image')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">وضعیت</label>
                        <select name="status" class="w-full border mt-2 p-2">
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>غیرفعال</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>فعال</option>
                        </select>
                        @error('status')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">آدرس URL</label>
                        <input type="text" name="url" value="{{ old('url', $banner->url) }}" class="w-full border mt-2 p-2">
                        @error('url')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">موقعیت</label>
                        <select name="position" class="w-full border mt-2 p-2">
                            @foreach ($positions as $key => $value)
                                <option value="{{ $key }}" {{ old('position') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('position')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex justify-end mt-5 space-x-3">
                        <button type="reset" class="button w-24 border text-gray-700">لغو</button>
                        <button type="submit" class="button w-24 bg-blue-600 text-white">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>

@endsection

