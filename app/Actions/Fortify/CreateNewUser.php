<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'no_scan' => [
                'required',
                'string',
                'max:50',
                Rule::unique(User::class),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'dept' => ['required', 'string', 'max:100'],
            'jabatan' => ['required', 'string', 'max:100'],
            'status_active' => ['boolean'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role' => ['required', 'string', Rule::in(Role::all()->pluck('name')->toArray())],
        ])->validate();

        // Handle profile picture upload
        $profilePath = null;
        if (isset($input['profile'])) {
            $profilePath = $input['profile']->store('profiles', 'public');
        }

        $user = User::create([
            'no_scan' => $input['no_scan'],
            'name' => $input['name'],
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'dept' => $input['dept'],
            'jabatan' => $input['jabatan'],
            'status_active' => $input['status_active'] ?? true,
            'profile' => $profilePath,
        ]);

        // Assign role to the user
        $user->assignRole($input['role']);

        return $user;
    }
}
