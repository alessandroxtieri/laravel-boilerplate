<?php

namespace App\Http\Requests;

use App\Models\User;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserStoreRequest
 *
 * This class represents the form request used for storing user-related data.
 * It extends Laravel's FormRequest class, providing validation rules and authorization logic.
 * The class defines the rules for validating requests when storing user data, ensuring data integrity.
 *
 * This PHP code was authored by Alessandro Tieri.
 * For inquiries related to this code, please contact Alessandro Tieri.
 *
 * @author Alessandro Tieri
 */
class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    $encryptedValue = Encrypter::encrypt($value);

                    $existingRecord = User::where('email', $encryptedValue)
                        ->first();

                    if ($existingRecord) {
                        $fail('L\'indirizzo email è già stato registrato nel sistema.');
                    }
                },
                'max:255',
            ],
            'password' => 'required|string|min:6',
            'role' => 'required',
        ];
    }

    /**
     * Get the custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Il campo "Nome" è obbligatorio.',
            'name.string' => 'Il campo "Nome" deve essere una stringa.',
            'name.max' => 'Il campo "Nome" non può superare :max caratteri.',

            'email.required' => 'Il campo "Email" è obbligatorio.',
            'email.email' => 'Il campo "Email" deve essere un indirizzo email valido.',
            'email.max' => 'Il campo "Email" non può superare :max caratteri.',

            'password.required' => 'Il campo "Password" è obbligatorio.',
            'password.string' => 'Il campo "Password" deve essere una stringa.',
            'password.min' => 'Il campo "Password" deve essere lungo almeno :min caratteri.',

            'role.required' => 'Il campo "Ruolo" è obbligatorio.',
        ];
    }
}
