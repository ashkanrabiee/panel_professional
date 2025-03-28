@extends("panel.layouts.master")
@section("content")
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        ساخت پست
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.content.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>نام پست</label>
                        <input type="text" name="title" class="input w-full border mt-2" placeholder="نام پست" required>
                    </div>
                    <div>
                        <label>اسلاگ</label>
                        <input type="text" name="slug" class="input w-full border mt-2" placeholder="اسلاگ" required>
                    </div>
                    <div class="mt-3">
                        <label>تگ‌ها</label>
                        <input type="text" id="tags-input" class="input w-full border mt-2" placeholder="تگ‌ها را وارد کنید و Enter بزنید">
                        <input type="hidden" name="tags" id="tags-hidden">
                        <div id="tags-container" class="mt-2 flex flex-wrap gap-2"></div>
                    </div>
                    <div class="mt-3">
                        <label>بدنه پست</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" required></textarea>
                        </div>
                    </div>
                    <div>
                        <label>تصویر پست</label>
                        <input type="file" name="image" class="input w-full border mt-2" required>
                    </div>
                    <div>
                        <div class="mt-3">
                            <label>وضعیت</label>
                            <div class="mt-2">
                                <input type="checkbox" class="input input--switch border" name="status">
                            </div>
                        </div>
                        <label>باز و بسته بودن کامنت</label>
                        <div class="mt-2">
                            <input type="checkbox" class="input input--switch border" name="commentable">
                        </div>
                    </div>
                    <div class="mt-2"> 
                        <label>دسته‌بندی</label>
                        <select name="category_id" class="select2 w-full">
                            <option value="1">--- دسته‌بندی مورد نظر خود را انتخاب کنید ---</option>
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="button w-24 bg-theme-1 text-white">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>

<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');

    document.addEventListener("DOMContentLoaded", function () {
        let tagsInput = document.getElementById("tags-input");
        let tagsContainer = document.getElementById("tags-container");
        let tagsHidden = document.getElementById("tags-hidden");
        let tagsArray = [];

        tagsInput.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                let tag = tagsInput.value.trim();
                if (tag !== "" && !tagsArray.includes(tag)) {
                    tagsArray.push(tag);
                    updateTagsUI();
                    tagsInput.value = "";
                }
            }
        });

        function updateTagsUI() {
            tagsContainer.innerHTML = "";
            tagsArray.forEach(tag => {
                let tagElement = document.createElement("span");
                tagElement.classList.add("bg-blue-500", "text-white", "px-2", "py-1", "rounded");
                tagElement.textContent = tag;
                tagElement.addEventListener("click", function () {
                    tagsArray = tagsArray.filter(t => t !== tag);
                    updateTagsUI();
                });
                tagsContainer.appendChild(tagElement);
            });
            tagsHidden.value = JSON.stringify(tagsArray);
        }
    });
</script>

@endsection
