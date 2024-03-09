<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'organisator_id' => ['exists:organisators,id'],
            'category_id' => ['exists:categories,id'],
            'poster' =>['required', 'image', 'max:2048'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65535'],
            'location' => ['required', 'string'],
            'date' => ['required', 'date_format:Y-m-d'],
            'capacity' => ['required', 'integer', 'min:0'],
            'available_seats' => ['required', 'integer', 'min:0'],
            'reservation_type' => ['required','array'],
            'reservation_type' => ['in:automatique,manuel'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }
}
