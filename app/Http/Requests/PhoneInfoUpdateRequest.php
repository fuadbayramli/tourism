<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class PhoneInfoUpdateRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class PhoneInfoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
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
