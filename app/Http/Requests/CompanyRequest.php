<?php

namespace App\Http\Requests;

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
        return [
            'name' =>'required',
<<<<<<< HEAD
            'email' => 'required|unique:companies|max:255',
            'image' => 'required|dimensions:min_width=100,min_height=100|mimes:jpeg,png,gif'
=======
            'email' => 'required|unique:users|max:255',
            // 'image' => 'required|dimensions:max_width=184,max_height=274|mimes:jpeg,png,gif'
>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
    
        ];
    }
}
