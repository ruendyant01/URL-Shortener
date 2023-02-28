<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUrlRequest extends FormRequest
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
            //
            "originalUrl" => "required|url",
            "user_id" => "required|numeric"
        ];
    }

    public function messages() {
        return [
            "originalUrl.url" => "Original Url must be Valid Url",
            "originalUrl.required" => "Original Url cannot be empty",
            "user_id.required" => "User Id not valid"
        ];
    }
}
