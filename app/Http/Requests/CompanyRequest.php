<?php

namespace App\Http\Requests;

use App\Models\Company;
use GuzzleHttp\Psr7\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required',
                        'email' => 'required|unique:companies,email|email',
                        'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff|image|dimensions:width=500,height=500',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => ['required'],
                        'email' => ['required', 'email', 'unique:companies,email,' . $this->id . ',id'],
                        'image' => ['mimes:jpg,jpeg,png,bmp,tiff', 'dimensions:min_width=100,min_height=100'],
                    ];
                }
        }
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'image.mimes' => 'Invalid file format',
            'image.dimensions' => 'Invalid image dimensions. Minimum width and height required: 100px.',
        ];
    }
}
