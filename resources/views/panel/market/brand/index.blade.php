@extends('panel.layouts.master')

@section('head-tag')
    <title>بنر ها</title>
    
    <style>
        /* رنگ پیش‌فرض قرمز (غیرفعال) */
        .form-check-input {
            background-color: red !important;
            border-color: red !important;
        }

        /* تغییر رنگ به آبی وقتی فعال شود */
        .form-check-input:checked {
            background-color: blue !important;
            border-color: blue !important;
        }

        /* جلوگیری از تغییر رنگ دایره داخلی */
        .form-check-input::before {
            background-color: white !important;
        }
    </style>
@endsection



@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2"><a href="{{ route('admin.market.brand.create') }}">ایجاد بنر</a></button>
        <div class="dropdown relative">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                </div>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2 w-full border border-gray-300">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="whitespace-no-wrap px-4 py-2 border border-gray-300 text-center">#</th>
                    <th class="px-4 py-2 border border-gray-300">نام فارسی برند</th>
                    <th class="px-4 py-2 border border-gray-300">نام اصلی برند</th>
                    <th class="px-4 py-2 border border-gray-300">لوگو</th>
                    <th class="px-4 py-2 border border-gray-300 text-center">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr class="intro-x bg-white hover:bg-gray-50 transition">
                        <th class="px-4 py-2 border border-gray-300 text-center">{{ $loop->iteration }}</th>
                        <td class="px-4 py-2 border border-gray-300">{{ $brand->persian_name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $brand->original_name }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <img src="{{ asset($brand->logo['indexArray'][$brand->logo['currentImage']] ) }}" alt="لوگو" width="100" height="50">
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.market.brand.edit', $brand->id) }}"
                                   class="flex items-center text-blue-600 hover:underline">
                                    <i data-feather="edit" class="w-4 h-4 mr-1"></i> ویرایش
                                </a>
                                <form action="{{ route('admin.market.brand.destroy', $brand->id) }}" method="post"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center text-red-600 hover:underline delete">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>


@endsection

@section('script')
    

<script type="text/javascript">

    function changeStatus(id){
        var element = $("#" + id)
        var url = element.attr('data-url')
        var elementValue = !element.prop('checked');

        $.ajax({
            url : url,
            type : "GET",
            success : function(response){
                if(response.status){
                    if(response.checked){
                        element.prop('checked', true);
                        successToast('بنر  با موفقیت فعال شد')
                    }
                    else{
                        element.prop('checked', false);
                        successToast('بنر  با موفقیت غیر فعال شد')
                    }
                }
                else{
                    element.prop('checked', elementValue);
                    errorToast('هنگام ویرایش مشکلی بوجود امده است')
                }
            },
            error : function(){
                element.prop('checked', elementValue);
                errorToast('ارتباط برقرار نشد')
            }
        });

        function successToast(message){

            var successToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                        '<span aria-hidden="true">&times;</span>\n' +
                        '</button>\n' +
                        '</section>\n' +
                        '</section>';

                        $('.toast-wrapper').append(successToastTag);
                        $('.toast').toast('show').delay(5500).queue(function() {
                            $(this).remove();
                        })
        }

        function errorToast(message){

            var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                        '<span aria-hidden="true">&times;</span>\n' +
                        '</button>\n' +
                        '</section>\n' +
                        '</section>';

                        $('.toast-wrapper').append(errorToastTag);
                        $('.toast').toast('show').delay(5500).queue(function() {
                            $(this).remove();
                        })
        }
    }

    $(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var form = $(this).closest('form');
    Swal.fire({
        title: 'آیا مطمئن هستید؟',
        text: "این عملیات قابل بازگشت نیست!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'بله، حذف کن!',
        cancelButtonText: 'لغو'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let switchInput = document.getElementById("customSwitch");

        switchInput.addEventListener("change", function () {
            Swal.fire({
                icon: this.checked ? "success" : "error",
                title: this.checked ? "وضعیت: فعال شد ✅" : "وضعیت: غیرفعال شد ❌",
                confirmButtonText: "باشه"
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('panel.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
