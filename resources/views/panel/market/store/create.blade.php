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
                <form action="{{route("admin.market.store.store",[$product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                <div>
                    <label>نام تحویل گیرنده</label>
                    <input type="text" name="reciver" class="input w-full border mt-2" placeholder="نام تحویل گیرنده" value="" required>
                </div>
                <div>
                    <label>نام تحویل دهنده</label>
                    <input type="text" name="deliver" class="input w-full border mt-2" placeholder="نام تحویل دهنده" required>
                </div>
                <div class="mt-3">
                    <label>تعداد</label>
                    <div class="mt-2">
                        <input type="text" name="marketable_number" class="input w-full border mt-2" placeholder="تعداد" required>
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