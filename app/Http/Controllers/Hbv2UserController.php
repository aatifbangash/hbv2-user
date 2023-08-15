<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class Hbv2UserController extends Controller
{

    public function getUsers()
    {
        $users = User::all();

        if($users->isEmpty()) return response()->json(["message" => "not found"], 404);
        return UserResource::collection($users);
    }

    public function getUser($id)
    {
        return response()->json(['id' => $id, 'name' => 'John Doe', 'email' => 'john@example.com']);
    }

    public function createUser(Request $request)
    {
        // Perform validation and create the user
        // ...

        // Return the response
        return response()->json(['message' => 'User created successfully']);
    }

    public function updateUser(Request $request, $id)
    {
        // Perform validation and update the user based on the $id
        // ...

        // Return the response
        return response()->json(['message' => 'User updated successfully']);
    }

    public function deleteUser($id)
    {
        // Delete the user from the database based on the $id
        // ...

        // Return the response
        return response()->json(['message' => 'User deleted successfully']);
    }
}
