<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function inscription(Request $request) {
        $donne = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "string"]
        ]);

        $user = User::create([
            "name" => $donne["name"],
            "email" => $donne["email"],
            "password" => bcrypt($donne["password"])
        ]);
        return response($user, 201);
    }

    public function login(Request $request) {
        $donne = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string"]
        ]);

        $user = User::where("email", $donne["email"])->first();
        if (!$user) return response(["message" => "Aucun utilisateur"], 401);
        if (!Hash::check($donne["password"], $user->password)) {
            return response(["message" => "Aucun utilisateur"], 401);
        }
        $token = $user->createToken("CLE_SECRETE")->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token
        ]);
    }
}
