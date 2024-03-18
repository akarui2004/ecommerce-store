<?php

namespace App\Http\Requests\OAuth;

use App\Traits\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{
    use ApiFormRequest;
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
            'accessToken' => 'required',
            'secret' => 'required'
        ];
    }
}
