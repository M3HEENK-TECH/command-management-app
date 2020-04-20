<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Validator to Validate and Optimize Login Request
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
{
    public function expectsJson()
    {
        return true;
    }

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
            "email" => 'required|string|email',
            'password' => 'required|string'
        ];
    }
}
