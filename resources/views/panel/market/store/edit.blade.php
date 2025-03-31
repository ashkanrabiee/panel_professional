@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        اضافه کردن موجودی
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.market.store.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div>
                    <label>تعداد قابل فروش</label>
                    <input type="text"  name="marketable_number" value="{{ old('marketable_number', $product->marketable_number) }}" class="input w-full border mt-2" placeholder="نام تحویل گیرنده" value="" required>
                </div>
                <br>
                <div>
                    <label>تعداد فروخته شده</label>
                    <input type="text" name="sold_number" value="{{ old('sold_number', $product->sold_number) }}" class="input w-full border mt-2" placeholder="نام تحویل دهنده" required>
                </div>
             
                <div>
                    <label>تعداد رزرو شده</label>
                    <input type="text" name="frozen_number" value="{{ old('frozen_number', $product->frozen_number) }}" class="input w-full border mt-2" placeholder="نام تحویل دهنده" required>
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
@section('script')
<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script> 

@endsection