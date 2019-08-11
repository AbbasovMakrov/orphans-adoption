<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrhpanRequest extends FormRequest
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
            'name' => ["required","string","max:200","unique:orphans"],
            'age' => ['required','integer','max:18'],
            'location' => ['required','string'],
            'other_details' => ["nullable","string"],
            'image' => ['nullable','image','mimes:png,jpg,jpeg']
        ];
    }
}
