<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cover_image' => 'required|image|max:2048',
            'title' => 'required|string|max:244',
            'slug' => 'required|string|max:244',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id',
            'body' => 'required',
            'tagNames' => 'required|array|min:1',
            'tagNames.*' => 'exists:tags,name',
            'status' => 'nullable|in:published,draft',
            'excerpt' => 'required|string',
        ];
    }
}
