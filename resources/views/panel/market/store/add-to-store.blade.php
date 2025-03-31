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
                <form action="{{ route('admin.market.store.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div>
                    <label>نام تحویل گیرنده</label>
                    <input type="text"  name="receiver" value="{{ old('receiver') }}" class="input w-full border mt-2" placeholder="نام تحویل گیرنده" value="" required>
                </div>
                <br>
                <div>
                    <label>نام تحویل دهنده</label>
                    <input type="text" name="deliverer" value="{{ old('deliverer') }}" class="input w-full border mt-2" placeholder="نام تحویل دهنده" required>
                </div>
                <div class="mt-3">
                    <label>تعداد</label>
                    <div class="mt-2">
                        <input type="text" nname="marketable_number" value="{{ old('marketable_number') }}" class="input w-full border mt-2" placeholder="تعداد" required>
                    </div>
                </div>
                
                <br>
                <div>
                    <label for="">توضیحات</label>
                    <textarea name="description" id="description" class="form-control form-control-sm" rows="6">{{ old('description') }}</textarea>
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