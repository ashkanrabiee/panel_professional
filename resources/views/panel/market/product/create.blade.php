@extends('panel.layouts.master')

@section('head-tag')
    <title> پست ها</title>
@endsection


@section('content')
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
        ساخت محصول
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
<form action="" method="post">
    @csrf
                <div>
                    <label>ساخت محصول</label>
                    <input type="text" name="name" class="input w-full border mt-2" placeholder="نام محصول">
                </div>
                <div class="mt-3">
                    <label>مقدمه</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" name="introduction" class="summernote"></textarea>
                    </div>
                </div>
                <div class="mt-3">
                <div>
                    <label>اسلاگ</label>
                    <input type="text" name="slug" class="input w-full border mt-2" placeholder="اسلاگ">
                </div>
                </div>
                    <div class="mt-3">
                        <div>
                            <label>وزن</label>
                            <input type="number" name="weight" class="input w-full border mt-2" placeholder="وزن">
                        </div>
                        </div>
                        <div class="mt-3">
                            <div>
                                <label>طول</label>
                                <input type="number" name="length" class="input w-full border mt-2" placeholder="طول">
                            </div>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <label>عرض</label>
                                    <input type="number" name="width" class="input w-full border mt-2" placeholder="عرض">
                                </div>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <label>ارتفاع</label>
                                        <input type="number" name="height" class="input w-full border mt-2" placeholder="ارتفاع">
                                    </div>
                                    </div>
                                    <div class="mt-3">
                                        <div>
                                            <label>قیمت</label>
                                            <input type="number" name="price" class="input w-full border mt-2" placeholder="قیمت">
                                        </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>وضعیت</label>
                                            <div class="mt-2">
                                                <input type="checkbox" class="input input--switch border" name="status">
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>اجازه فروش</label>
                                            <div class="mt-2">
                                                <input type="checkbox" class="input input--switch border" name="marketable">
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div>
                                                <label>تگ ها</label>
                                                <input type="text" name="tags" class="input w-full border mt-2" placeholder="اسلاگ">
                                            </div>
                                            </div>
                                            <div class="custom-form container-fluid d-flex justify-content-center align-items-center min-vh-100">
                                                <div class="form-container p-4 border rounded shadow-sm bg-white" style="max-width:800px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label fw-bold d-block">برندها</label>
                                                                <select name="brands" class="form-control form-select mt-1">
                                                                    <option value="" selected="">لطفا انتخاب کن</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label fw-bold d-block">کتگوری ها</label>
                                                                <select name="categories" class="form-control form-select mt-1">
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

