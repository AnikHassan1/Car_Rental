<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\profile;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

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
    public function login(Request $request)
    {
         $count = User::where('email', '=', $request->input('email'))
             ->where('password', '=', $request->input('password'))
             ->select('id')->first();
         if ($count !== null) {
             $token = JWTToken::createJwtToken($request->input('email'), $count->id);
             return response()->json([
                 "status" => "success",
                 "message" => "log in success"
             ], 200)->cookie('token', $token, 60 * 24 * 30);
         } else {
             return response()->json([
                 'status' => "failed",
                 'message' => "unauthorized"
             ], 401);
        }
        return 1;
    }

    public function logout(Request $request){
        return response()->json([
            "status" => "log out success",
            "url" => "login page url",
        ], 200)->cookie("token", null, -1);
    }

    public function profileGet(Request $request){
        $user_id = $request->id;

        return profile::where('id',$user_id)->with('user')->first();
    }

    public function createProfile(Request $request){
        $user_id = $request->header('id');
        $validatedData = $request->validate([

            'number' => ['required'],
            'address' =>['required']

        ]);
        try{
            Profile::updateOrCreate([
                'number' => $request->input('number'),
                'address' => $request->input('address'),
                'user_id'=>$user_id
            ]);

            return response()->json([
                'status' => "success",
                'message' => "profile updatedvgvkgv"
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => "failed",
                'message' => $e->getMessage()
            ], 401);
        }


    }
}