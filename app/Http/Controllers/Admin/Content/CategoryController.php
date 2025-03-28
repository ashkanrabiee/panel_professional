<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {

        $category = PostCategory::query()->paginate(1005);
        return view('panel.content.category.index',["category"=>$category]);
    }
    public function create()
    {
        return view('panel.content.category.create');
    }
    public function edit($category){
        $category = PostCategory::find($category)->first();
        return view('panel.content.category.edit',["category"=>$category]);

    }
    public function store(PostCategoryRequest $request, ImageService $imageService) {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'postCategory');
            $result = $imageService->save($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.content.category.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result ;
        }
        $cat = PostCategory::create($inputs);
        return view("panel.content.category.create");
    }


    public function destroy($category)
    {
        $category = PostCategory::find($category);
        if ($category->delete()) {
            return redirect()->route('admin.content.category.index')->with('swal-success', 'بنر با موفقیت حذف شد.');
        } else {
            return redirect()->route('admin.content.category.index')->with('swal-error', 'خطا در حذف بنر!');
        }
    }
    public function update($category,Request $request,ImageService $imageService){
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'Posts');
            $result = $imageService->save($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
         $inputs['image']= $result;
        }
        PostCategory::find($category)->update($inputs);
        return to_route("admin.content.category.index");
    }

}
