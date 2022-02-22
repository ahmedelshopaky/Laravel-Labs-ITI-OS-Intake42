<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            // make sure when updating post without changing Title it still works
            'title' => ['required', 'min:3', Rule::unique('posts','title')->ignore($this->slug, 'slug')],
            'description' => ['required', 'min:10'],
            
            // make sure that no one hacks you and send an id of post
            // creator that doesn’t exist in the database
            'user_id' => 'exists:users,id',
        ];
    }
}
