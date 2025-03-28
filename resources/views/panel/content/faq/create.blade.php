@extends('panel.layouts.master')

@section('head-tag')
    <title> سوالات متداول</title>
@endsection


@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Form Layout
    </h2>
</div>
<div class="flex justify-center items-center min-h-screen">
    <div class="grid grid-cols-12 gap-6 w-full max-w-3xl">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.content.faq.store')}}" method="POST" id="form">
                    @csrf
                    <div>
                        <label> پرسش </label>
                        <input type="text" class="input w-full border mt-2" name="question" id="name" value="{{ old('question') }}">
                    </div>
                    <br>
                    <div>
                        <label for="">پاسخ</label>
                        <textarea name="answer" id="answer" class="form-control form-control-sm" rows="6">{{ old('answer') }}</textarea>
                    </div>
                    <div>
                        <label for="tags">تگ‌ها</label>
                        <input type="hidden" name="tags" id="tags" value="{{ old('tags') }}">
                        <select id="select_tags" class="select2 w-full border mt-2" multiple></select>
                    </div>
                    
                    @error('tags')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="mt-3">
                        <label> وضعیت </label>
                        <div class="mt-2">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" name="status" value="1" class="input input--switch border" {{ old('status', $status ?? 0) == 1 ? 'checked' : '' }}>
                        </div>
                    </div>
                    
                    @error('status')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="text-right mt-5">
                        <button type="reset" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="{{ asset('panel-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('answer');
</script>
<script>
    $(document).ready(function () {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = null;

        if (default_tags !== null && default_tags.length > 0) {
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder: 'لطفا تگ‌های خود را وارد کنید',
            tags: true,
            data: default_data
        });

        select_tags.children('option').attr('selected', true).trigger('change');

        $('#form').submit(function (event) {
            if (select_tags.val() !== null && select_tags.val().length > 0) {
                var selectedTags = select_tags.val().join(',');
                tags_input.val(selectedTags);
            }
        });
    });
</script>

@endsection
