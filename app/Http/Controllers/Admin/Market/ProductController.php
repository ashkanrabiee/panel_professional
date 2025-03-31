<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductMeta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('panel.market.product.index', compact('products'));
    }
    public function create()
    {
        
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return view('panel.market.product.create', compact('productCategories', 'brands'));
    }

    public function store(Request $request, ImageService $imageService)
    {
        
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }


        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  جدید شما با موفقیت ثبت شد');
    }



    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return view('panel.market.product.edit', compact('product' ,'productCategories', 'brands'));
    }

    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        DB::transaction(function () use ($request, $inputs, $product) {
        $product->update($inputs);
        if ($request->meta_key != null) {
            $meta_keys = $request->meta_key;
            $meta_values = $request->meta_value;
            $meta_ids = array_keys($request->meta_key);
            $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
                return array_combine(
                    ['meta_id', 'meta_key', 'meta_value'],
                    [$meta_id, $meta_key, $meta_value]
                );
            }, $meta_ids, $meta_keys, $meta_values);
            foreach ($metas as $meta) {
                ProductMeta::where('id', $meta['meta_id'])->update(
                    ['meta_key' => $meta['meta_key'], 'meta_value' => $meta['meta_value']]
                );
            }
        }
    });

        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  شما با موفقیت ویرایش شد');
    }


    public function destroy(Product $product)
    {
        $result = $product->delete();
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت حذف شد');
    }

}
