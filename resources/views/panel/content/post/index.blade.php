@extends('panel.layouts.master')

@section('head-tag')
    <title>پست ها </title>
@endsection



@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2"><a href="{{ route('admin.content.post.create') }}">ایجاد پست جدید</a></button>
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
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">نام</th>
                    <th class="whitespace-no-wrap">تصویر</th>
                    <th class="text-center whitespace-no-wrap">خلاصه</th>
                    <th class="text-center whitespace-no-wrap">کامنت</th>
                    <th class="text-center whitespace-no-wrap">وضعیت پست</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
             

@foreach ($post as $posti)
    


                <tr class="intro-x">
           
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap">{{$posti->title}}</a> 
                        <div class="text-gray-600 text-xs whitespace-no-wrap">{{$posti->tags}}</div>
                    </td>
                    <td class="text-center">
                        <img src="{{ asset($posti->image) }}" alt="بنر" width="100" height="50">

                    </td>
                    <td class="w-40">
                        {{strip_tags($posti->summary)}}
                    </td>
                    <td class="text-center">
                        @if ($posti->commentable == 0)
                            بسته است
                            @else
                            باز است
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($posti->status == 0)
                            بسته است
                            @else
                            باز است
                        @endif
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('admin.content.post.edit',$posti->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <form class="d-inline" action="{{ route('admin.content.post.destroy', $posti->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center text-theme-6 btn btn-danger btn-sm delete" type="submit">
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
