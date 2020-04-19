<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
             'profile_image' => ['nullable', 'image'],
             'name' => ['required', 'string', 'max:255', Rule::unique("users")->ignore($this->cashier)],
             'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users")->ignore($this->cashier)],
             'password' => ['nullable', 'string', 'min:8', 'confirmed'],
           
        ];
    }



}

