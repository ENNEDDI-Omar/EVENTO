<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'organisator_id' => ['sometimes', 'exists:organisators,id'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'poster' =>['sometimes', 'image', 'max:4096'],
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:65535'],
            'location' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date_format:Y-m-d'],
            'capacity' => ['sometimes', 'integer', 'min:0'],
            'available_seats' => ['sometimes', 'integer', 'min:0'],
            'event_status' => ['sometimes', 'in:draft,published,closed'],
            'reservation_type' => ['sometimes', 'in:automatique,manuel'],
            'price' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
