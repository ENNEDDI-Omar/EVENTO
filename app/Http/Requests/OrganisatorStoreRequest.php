<?php

namespace App\Http\Requests;

use App\Rules\ValidCodeForEstablishment;
use Illuminate\Foundation\Http\FormRequest;

class OrganisatorStoreRequest extends FormRequest
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
                'user_id' => ['required', 'exists:users,id'],
                'establishment_id' => ['required','array', 'exists:establishments,id'],
                'confirmation_code' => ['required','digits:4', 'throttle:2,1', new ValidCodeForEstablishment()],
        ];
    }
}