<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->isMethod('post'))
        {
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'url' => 'required|max:500|min:5',
                'status' => 'required|numeric|in:0,1',
                'position' => 'required|numeric',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            ];
        }
        else
        {
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'url' => 'required|max:500|min:5',
                'status' => 'required|numeric|in:0,1',
                'position' => 'required|numeric',
                'image'     => 'mimes:png,jpg,jpeg,gif',
            ];
        }

    }
}
