<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //sign up

    public function signUp(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users'],
            'password' => ['required']

        ]);

        try {
            $role = $request->input('role', 'customer');

            // Create the user and hash the password
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),  // Hash the password
                'role' => $role,
            ]);

            // Return response
            return response()->json([
                'message' => ($role === 'admin') ? 'Admin signup successful' : 'Customer signup successful',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    
    
}
