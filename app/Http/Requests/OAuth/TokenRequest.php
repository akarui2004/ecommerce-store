<?php

namespace App\Http\Requests\OAuth;

use App\Traits\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{
    use ApiFormRequest;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'accessToken' => 'required',
            'secret'      => 'required'
        ];
    }
}
