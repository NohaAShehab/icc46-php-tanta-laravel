<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        // check number of tokens ?
        $no_of_tokens = $user->tokens()->count();
        if ($no_of_tokens < 8) {
            return $user->createToken($request->device_name)->plainTextToken;

        }
        return response()->json([
            "message" => "You exceeded the maximum number of logged in devices.",
        ]);
    }
    function register(Request $request){
        // create the user ?

    }
    function logout(Request $request){
        if($request->user()->tokenCan('logout')){
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Logged out'
            ]);
        }
        return response()->json([
            "message" => "Invalid token"
        ]);
//        return $request->user()->currentAccessToken();

    }

    function logoutFromAll(Request $request){
        $request->user()->tokens()->delete();
        return response('', 204);
    }
}
