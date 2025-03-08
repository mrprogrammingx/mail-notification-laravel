<?php

namespace App\Http\Requests;

class RegisterMeetupRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selectedMeetup' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ];
    }
}
