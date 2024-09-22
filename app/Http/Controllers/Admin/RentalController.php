<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function login(Request $request)
    {
        // $count = User::where('email', '=', $request->input('email'))
        //     ->where('password', '=', $request->input('password'))
        //     ->select('id')->first();
        
        // if ($count !== null) {
        //     $token = JWTToken::createJwtToken($request->input('email'), $count->id);
        //     return response()->json([
        //         "status" => "success",
        //         "message" => "log in success"
        //     ], 200)->cookie('token', $token, 60 * 24 * 30, '/');
        // } else {
        //     return response()->json([
        //         'status' => "failed",
        //         'message' => "unauthorized"
        //     ], 401);
        // }
        return 1;
    }
}
