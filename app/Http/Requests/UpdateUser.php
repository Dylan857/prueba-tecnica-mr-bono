<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if ($this->get('role')) {
            $this->rolValidate($this->get('role'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => $this->get('name') ? 'required|string': 'nullable',
            'email' => $this->get('email') ? 'required|email|unique:users,email': 'nullable',
            'password' => $this->get('password') ? 'required|min:6' : 'nullable',
            'role' => $this->get('role') ? 'required' : 'nullable'
        ];
    }

    private function rolValidate($rol)
    {
        $ROLES = ['admin', 'user'];

        if (!in_array($rol, $ROLES)) {
            throw ValidationException::withMessages([
                'message' => 'Invalid Role'
            ]);
        }
    }
}
