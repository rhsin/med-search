<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Retrieves all users as JSON resource collection, which includes the users' 
    // linked medications through Eloquent's many-to-many relationship
    public function index()
    {
        return UserResource::collection(User::all());
    }

    // Laravel Passport: creates/accepts the user's email / username, password, and device name, then exchanges
    // those credentials for a new access token. The endpoint will return the
    // plain-text access token which may then be stored on the mobile device
    // and used to make additional API requests.
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
        return $user->createToken($request->email)->accessToken;
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken($request->email)->accessToken;
    }

    // Testing for create/delete API tokens from React-Native
    public function createToken() {
        $user = User::find(1);
        return $user->createToken('React-Native')->accessToken;
    }

    // Testing for create/delete API tokens from React-Native
    public function deleteTokens() {
        $user = User::find(2);
        $user->tokens()->delete();
        return response('Deleted!', 204);
    }
}
