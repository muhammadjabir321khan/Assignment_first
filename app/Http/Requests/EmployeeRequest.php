<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
                        'fname' => 'required',
                        'lname' => 'required',
                        'company_id' => 'required|exists:companies,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                $id = $this->route('employees') ? $this->route('employees')->company_id : null; {
                    return [
                        'fname' => 'required',
                        'lname' => 'required',
                    ];
                }
        }
    }
    public function messages()
    {
        return [
            'company_id.required' => 'The :attribute field is required.',
            'company_id.exists' => 'The selected :attribute is invalid.',
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company name',
        ];
    }
}
