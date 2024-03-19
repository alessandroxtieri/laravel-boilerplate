<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;

class UserService
{
    /**
     * Store a new user in the database.
     *
     * @param  array<string, string>  $userData An associative array containing user data.
     *
     * @return User The created User model.
     */
    public function storeUser(array $userData): User
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);
    }

    /**
     * Update a user's information.
     *
     * @param  User  $user The user to be updated.
     * @param  array<string, string>  $userData An associative array containing the updated user data, including optional password field.
     */
    public function updateUser(User $user, array $userData): void
    {
        if (isset($userData['password']) && strlen($userData['password']) > 0) {
            $user->password = bcrypt($userData['password']);
            $user->save();
        }

        unset($userData['password']);

        $user->update($userData);
    }

    /**
     * Delete a user.
     *
     * @param  User  $user The user to delete.
     */
    public function deleteUser(User $user): JsonResponse
    {
        $user->delete();

        return Response::json([
            'success' => true,
            'message' => 'Utente eliminato con successo',
        ], 200);
    }

    /**
     * Assign a role to a user.
     *
     * @param  User  $user     The user to assign the role to.
     * @param  string  $roleName The name of the role to assign.
     */
    public function assignRoleToUser(User $user, string $roleName): void
    {
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }
    }
}
