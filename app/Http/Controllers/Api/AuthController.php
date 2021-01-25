<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {


        //validate request
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => true, "message" => $validator->errors()], 400);
        }

        $credentials = request(["email", "password"]);
        $token = auth("api")->attempt($credentials);

        if (!$token) {
            return response()->json(["error" => true, "message" => "Unautherized"], 401);
        }

        return response()->json([
            "access_token" => $token,
            "expire_in" => auth("api")->factory()->getTTL() * 3600
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json(["error" => false, "message" => "logout successfully"]);
    }
}
