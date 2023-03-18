<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'bio' => 'required',
            'image' => 'nullable|file|mimes:png,jpg,webp,pdf',
            'title' => 'nullable',
            'date_birth' => 'nullable|date',
            'address' => 'nullable'

        ];
    }
}

?>
