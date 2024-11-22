<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
        return [
            'title'      => 'required|max:255',
            'category'   => 'required|array',
            'category.*' => 'exists:categories,id', // Kiểm tra danh mục có tồn tại trong bảng categories
            'content'    => 'required',
            'summary'    => 'required',
            'thumbnail'  => 'image|mimes:jpg,png,webp|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Tiêu đề là bắt buộc',
            'category.required'  => 'Bạn phải chọn một danh mục',
            'category.*'         => 'Danh mục không hợp lệ',
            'content.required'   => 'Nội dung không được để trống',
            'summary.required'   => 'Vui lòng nhập tóm tắt',
            // 'thumbnail.required' => 'Ảnh thumbnail là bắt buộc',
            'thumbnail.image'    => 'Ảnh không đúng định dạng jpg, png hoặc webp',
        ];
    }
}
