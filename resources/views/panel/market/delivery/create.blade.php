@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت روش ارسال
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{route("admin.market.delivery.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div>
                    <label>نام روش ارسال</label>
                    <input type="text" name="name" class="input w-full border mt-2" placeholder="نام روش ارسال" required>
                </div>
                <div>
                    <label>هزینه ارسال</label>
                    <input type="text" name="amount" class="input w-full border mt-2" placeholder="هزینه ارسال" required>
                </div>
                <div>
                    <label>زمان ارسال</label>
                    <input type="date" name="delivery_time" class="input w-full border mt-2" placeholder="زمان ارسال" required>
                </div>
                <div>
                    <label>واحد زمان ارسال</label>
                    <input type="text" name="delivery_time_unit" class="input w-full border mt-2" placeholder="زمان ارسال" required>
                </div>
                <div class="mt-5">
                    <label>وضعیت</label>
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" class="input input--switch border" name="status" value="1">                </div>
                
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