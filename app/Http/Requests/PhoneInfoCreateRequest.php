<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneInfoCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'notes' => 'required',
        ];
    }
}
