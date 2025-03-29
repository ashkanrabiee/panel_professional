<?php

namespace App\Http\Controllers\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class SettingController extends Controller
{
    public function  index(){
        $setting = Setting::query()->first() ?? "";

        return view("panel.store.setting",["setting"=>$setting]);
    }
    public function  store(Request $request,ImageService $imageService){
        $setting = Setting::query()->first();
        $inputs = $request->all();
        if ($setting) {
            if($request->logo){
            $imageService->setExclusiveDirectory('logo' . DIRECTORY_SEPARATOR . 'setting');
            $resultlogo = $imageService->save($request->file('logo'));
            if($resultlogo === false){
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');

            }    
            $inputs['logo'] = $resultlogo;
        }
            if($request->icon){
            $imageService->setExclusiveDirectory('icon' . DIRECTORY_SEPARATOR . 'setting');
            $resulticon = $imageService->save($request->file('icon'));
            if($resulticon === false )
            {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['icon'] = $resulticon;
            }
        
        
            $setting->update($inputs);
            return to_route("admin.setting.index");
        } else {
            $imageService->setExclusiveDirectory('logo' . DIRECTORY_SEPARATOR . 'setting');
            $resultlogo = $imageService->save($request->file('logo'));
            $imageService->setExclusiveDirectory('icon' . DIRECTORY_SEPARATOR . 'setting');
            $resulticon = $imageService->save($request->file('icon'));
            if($resulticon === false && $resultlogo === false )
            {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $resultlogo;
            $inputs['icon'] = $resulticon;
        
        
            Setting::create($inputs);
            return to_route("admin.setting.index");

        }
        
    }
}
