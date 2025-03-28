<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;


class CategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('panel.market.category.index', compact('productCategories'));
    }
    
    public function create(){
       
        $categories = ProductCategory::where('parent_id' , null)->get();
        return view('panel.market.category.create',compact('categories'));
    }

    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if($result === false)
        {
            return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $productCategory = ProductCategory::create($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
    }

    public function edit(ProductCategory $productCategory)
    {
        $categories = ProductCategory::where('parent_id', null)->get()->except($productCategory->id);
        return view('panel.market.category.edit', compact('productCategory', 'categories'));
    }
    
    public function update(ProductCategoryRequest $request , ProductCategory $productCategory , ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            if(!empty($productCategory->image))
            {
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        else
        {
          if(isset($inputs['currentImage']) && !empty($productCategory->image))
          {
            $image = $productCategory->image;
            $image['currentImage'] = $inputs['currentImage'];
            $inputs['image'] = $image;
          }  
        }
        $productCategory->update($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }
    public function destroy(ProductCategory $productCategory)
    {
       $result = $productCategory->delete();
       return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
