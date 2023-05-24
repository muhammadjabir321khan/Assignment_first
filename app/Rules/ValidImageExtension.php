<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidImageExtension implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    protected $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    }
    public function passes($attribute, $value)
    {

        $extension = strtolower($value->getClientOriginalExtension());
        if (!in_array($extension, $this->allowedExtensions)) {
            return false;
        }
        $mimeType = $value->getClientMimeType();
        if (!in_array($mimeType, $this->allowedMimeTypes)) {
            return false;
        }
        return true;
    }
    public function message()
    {
        return 'The file must be a valid image with the allowed extensions: ' . implode(', ', $this->allowedExtensions);
    }
}
