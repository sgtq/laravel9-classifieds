<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required'],
            'title' => [
                'required',
                'min:10',
            ],
            'slug',
            'description' => [
                'required',
                'min:10',
            ],
            'price' => ['required'],
            'condition_id' => ['required'],
            'location' => ['required'],
            'country_id' => ['required'],
            'phone' => [
                'required',
                'min:10',
            ],
            'image_featured' => ['required'],
        ];
    }
}
