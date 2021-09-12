<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTramEventRequest extends FormRequest
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
            'title' => 'required|max:100',
            'author_id' => 'nullable|integer',
            'line_id' => 'required|integer',
            'eventcategory_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png'
        ];
    }
}
