<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'tweet' => 'required|max:140',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function tweet(): string
    {
        return $this->input('tweet');
    }

    public function user_id(): int
    {
        return $this->user()->id;
    }

    public function images(): array
    {
        return $this->file('images', []);
    }
}
