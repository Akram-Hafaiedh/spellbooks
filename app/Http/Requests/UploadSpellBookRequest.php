<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadSpellBookRequest extends FormRequest
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
        // return [
        //     'spellbook' => 'required|mimes:pdf|max:2048',
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string|max:1000',
        // ];
        return [
            'file' => 'required|mimes:pdf|max:10240', // Adjust max file size as needed
        ];
    }
}
