<?php

namespace Wewowweb\Trubar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrubarPostRequest extends FormRequest
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
            'post_type' => 'required',
            'post_status' => 'required',
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'published_at' => 'datetime',
        ];
    }
}
