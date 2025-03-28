<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\FaqRequest;
use App\Models\Content\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('created_at')->simplePaginate(15);
        return view('panel.content.faq.index', compact('faqs'));
    }
    public function create()
    {
        return view('panel.content.faq.create');
    }
    public function edit(Faq $faq)
    {
        return view('panel.content.faq.edit',compact('faq'));
    }
    public function store(FaqRequest $request)
    {   
    $inputs = $request->all();
    $faq = Faq::create($inputs);
    return redirect()->route('admin.content.faq.index')->with('swal-success', 'پرسش  جدید شما با موفقیت ثبت شد');
    }
    public function update(FaqRequest $request , Faq $faq)
    {
        $inputs = $request->all();
        $faq->update($inputs);
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'پرسش شما با موفقیت ویرایش شد');
    }
    public function destroy(Faq $faq)
    {
        $result = $faq->delete();
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'پرسش  شما با موفقیت حذف شد');
    }

    public function status(Faq $faq){

        $faq->status = $faq->status == 0 ? 1 : 0;
        $result = $faq->save();
        if($result){
                if($faq->status == 0){
                    return response()->json(['status' => true, 'checked' => false]);
                }
                else{
                    return response()->json(['status' => true, 'checked' => true]);
                }
        }
        else{
            return response()->json(['status' => false]);
        }

    }






}
