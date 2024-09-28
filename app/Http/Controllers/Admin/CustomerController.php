<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\profile;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class CustomerController extends Controller {
    //sign up

    public function signUp( Request $request ) {
        $validatedData = $request->validate( [
            'name' => [ 'required', 'max:255' ],
            'email' => [ 'required', 'unique:users' ],
            'password' => [ 'required' ]

        ] );

        try {
            //  $role = $request->input( 'role', 'customer' );

            // Create the user and hash the password
            User::create( [
                'name' => $request->input( 'name' ),
                'email' => $request->input( 'email' ),
                'password' => $request->input( 'password' ) // Hash the password

            ] );

            // Return response
            return response()->json( [
                'status' =>'success',
                'message' => 'Customer signup successful'
            ] );
        } catch ( Exception $e ) {
            return response()->json( [
                'status' => 'error',
                'message' => 'Customer signup Fail'
            ], 401 );
        }
    }

    public function login( Request $request ) {
        $count = User::where( 'email', '=', $request->input( 'email' ) )
        ->where( 'password', '=', $request->input( 'password' ) )->first();
       // return $count;
        if ( $count->role == 'admin' ) {

            $token = JWTToken::createJwtToken( $request->input( 'email' ), $count->id );
            return response()->json( [
                'status' => 'success',
                'url'=>'/admin-page',
                'message' => 'Admin log in success'
            ], 200 )->cookie( 'token', $token, 60 * 24 * 30 );
        } else {
            $token = JWTToken::createJwtToken( $request->input( 'email' ), $count->id );
            return response()->json( [
                'status' => 'success',
                'url'=>'/',
                'message' => 'User log in success'
            ], 200 )->cookie( 'token', $token, 60 * 24 * 30 );
        }

    }

    public function logout( Request $request ) {
        return response()->json( [
            'status' => 'log out success',
            'url' => 'login page url',
        ], 200 )->cookie( 'token', null, -1 );
    }

    public function forget( Request $request ) {
        try {
            $email = $request->header( 'email' );
            $password = $request->input( 'password' );
            // echo $password;
            $user = User::where( 'email', $email )->first();
            $user->password = $password;
            $user->save();
            return response()->json( [
                'status' => 'success',
                'message' => 'Reset Password Success'
            ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [
                'status' => 'failed',
                'message' => 'Reset Password fail'
            ], 401 );
        }
    }

    public function profileGet( Request $request ) {
        $user_id = $request->id;

        return profile::where( 'id', $user_id )->with( 'user' )->first();
    }

    public function createProfile( Request $request ) {
        $user_id = $request->header( 'id' );
        $validatedData = $request->validate( [

            'number' => [ 'required' ],
            'address' =>[ 'required' ]

        ] );
        try {
            Profile::updateOrCreate( [
                'number' => $request->input( 'number' ),
                'address' => $request->input( 'address' ),
                'user_id'=>$user_id
            ] );

            return response()->json( [
                'status' => 'success',
                'message' => 'profile updatedvgvkgv'
            ], 200 );
        } catch( Exception $e ) {
            return response()->json( [
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 401 );
        }

    }
}