@extends('panel.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
@endsection



@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2"><a href="{{ route('admin.content.faq.create') }}">ایجاد دسته بندی</a></button>
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
        <table class="table table-report w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr class="text-gray-700">
                    <th class="p-3 border border-gray-300 text-center">#</th>
                    <th class="p-3 border border-gray-300 text-right">پرسش</th>
                    <th class="p-3 border border-gray-300 text-center">خلاصه پاسخ</th>
                    <th class="p-3 border border-gray-300 text-center">وضعیت</th>
                    <th class="p-3 border border-gray-300 text-center">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr class="intro-x border border-gray-300 hover:bg-gray-50 transition">
                        <td class="p-3 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                        <td class="p-3 border border-gray-300 text-right">
                            <bdi>{{ $faq->question }}</bdi>
                        </td>
                        
                        <td class="p-3 border border-gray-300 text-center">{{ Str::limit(strip_tags($faq->answer), 50) }}</td>
                        <td class="p-3 border border-gray-300 text-center">
                            <label class="flex items-center justify-center">
                                <input id="{{ $faq->id }}" onchange="changeStatus({{ $faq->id }})" 
                                    data-url="{{ route('admin.content.faq.status', $faq->id) }}" 
                                    type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" 
                                    @if ($faq->status === 1) checked @endif>
                            </label>
                        </td>
                        <td class="p-3 border border-gray-300 text-center">
                            <div class="flex justify-center items-center space-x-3">
                                <a class="flex items-center text-blue-600 hover:text-blue-800 transition" 
                                   href="{{ route('admin.content.faq.edit', $faq->id) }}">
                                    <i data-feather="edit" class="w-4 h-4 mr-1"></i> ویرایش
                                </a>
                                <form class="d-inline" action="{{ route('admin.content.faq.destroy', $faq->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex items-center text-red-600 hover:text-red-800 transition" type="submit">
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
