<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\BannerRequest;
use App\Models\Content\Banner;
use App\Http\Services\Image\ImageService;

class BannnerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('created_at' , 'desc')->simplePaginate(15);
        $positions = Banner::$positions;
        return view('panel.content.banner.index',compact('banners','positions'));
    }
    public function create()
    {
        $positions = Banner::$positions;
        return view('panel.content.banner.create',compact('positions'));
    }

    public function store(BannerRequest $request ,  ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result ;
        }
        $banners = Banner::create($inputs);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  جدید شما با موفقیت ثبت شد');
    }


    public function edit(Banner $banner)
    {
        $positions = Banner::$positions;
        return view('panel.content.banner.edit', compact('banner', 'positions'));
    }

    public function destroy(Banner $banner)
    {
        if ($banner->delete()) {
            return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر با موفقیت حذف شد.');
        } else {
            return redirect()->route('admin.content.banner.index')->with('swal-error', 'خطا در حذف بنر!');
        }
    }

    public function update(BannerRequest $request , Banner $banner , ImageService $imageService)
    {
        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($banner->imaage))
            {
                $imageService->deleteImage($banner->image);
            }
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else {
            if (isset($inputs['currentImage']) && !empty($banner->image)) {
                $image = $banner->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $banner->update($inputs);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  شما با موفقیت ویرایش شد');
    }




    
    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 0 ? 1 : 0;
        $result = $banner->save();
        if ($result) {
            if ($banner->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


}
