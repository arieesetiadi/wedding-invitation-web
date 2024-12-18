<?php

namespace App\Http\Requests\Rsvp;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'invitation_id' => ['nullable', 'integer', Rule::exists('t_invitation', 'invitation_id')],
            'full_name' => ['required', 'string', 'max:64'],
            'phone' => ['required', 'string', 'max:20'],
            'attendance' => ['required', 'boolean'],
            'num_guest' => ['nullable', 'numeric', 'min:1', 'max:5'],
            'greetings' => ['required', 'string'],
            'guest2name' => ['nullable', 'string', 'max:64'],
            'guest3name' => ['nullable', 'string', 'max:64'],
            'guest4name' => ['nullable', 'string', 'max:64'],
            'guest5name' => ['nullable', 'string', 'max:64'],
        ];
    }
}
