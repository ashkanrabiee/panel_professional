<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Post;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        
        return view('panel.content.post.index',["post"=>$post]);
    }

    public function create()
    {
        $category = PostCategory::all();
        return view('panel.content.post.create',["category"=>$category]);
    }
    public function store(Request $request,ImageService $imageService)
    {
        
        
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('image' . DIRECTORY_SEPARATOR . 'Posts');
            $result = $imageService->save($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
         
        }
        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'summary' =>$request->summary,
            'image' => $result,
            'status' => $request->has('status') ? 1 : 0,
            'commentable' => $request->has('commentable') ? 1 : 0,
            'tags' => $request->tags,
            'published_at' => now(),
            'author_id' => 1,
            'category_id' => $request->category_id,
        ]);
        return to_route("admin.content.post.index");
    }
    public function edit($post)
    {
        $post = Post::find($post);
        $category = PostCategory::all();
        return view('panel.content.post.edit',["post"=>$post,"category"=>$category]);
    }

    public function destroy($post){

        Post::find($post)->delete();
        return redirect()->back();
    }

    public function update($post,Request $request,ImageService $imageService){
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
        Post::find($post)->update($inputs);
        return to_route("admin.content.post.index");
    }
}
