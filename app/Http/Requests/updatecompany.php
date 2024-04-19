<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updatecompany extends FormRequest
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
        $id = $this->company_id;
        return [
            'company_name' => [
                'required',
                Rule::unique('companies', 'name')->ignore($id),

            ],

            'email' => [
                'required',
                'email',
                Rule::unique('companies', 'email')->ignore($id),
            ],
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'logo.dimensions' => 'the minumum size  100* 100',
        ];
    }
}
