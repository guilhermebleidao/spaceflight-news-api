<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255', 'unique:articles,url'],
            'imageUrl' => ['required', 'url', 'max:255'],
            'newsSite' => ['required', 'max:255'],
            'summary' => ['required', 'string', 'max:255'],
            'publishedAt' => ['required', 'string', 'max:255'],
            'updatedAt' => ['required', 'string', 'max:255'],
            'featured' => ['required', 'boolean']
        ];
    }
}
