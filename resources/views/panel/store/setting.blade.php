@extends("panel.layouts.master")
@section("content")
<div class="intro-y box mt-5">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            تنظیمات
        </h2>

    </div>
    <div class="p-5" id="input-sizing">
        <div class="preview">
            <form action="{{ route('admin.setting.store') }}"></form>
            <input type="text" class="input input--sm w-full border" placeholder="نام">
            <input type="text" class="input w-full border mt-2" placeholder="نام فارسی">
            <input type="text" class="input input--lg w-full border mt-2" placeholder="شعار سایت">
        </div>

    </div>
</div>
@endsection