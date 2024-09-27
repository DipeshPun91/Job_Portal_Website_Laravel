<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationJobRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'job_id' => 'required',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable',
            'attachments' => 'required|max:2048|mimes:doc,docx,odt,rtf,txt,pdf',
            'cover_letter' => 'required|max:5000'
        ];
    }
}
