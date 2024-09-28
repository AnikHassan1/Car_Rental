<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller {
    function home( Request $request ) {
        if ( $request->cookie( 'token' ) == null ) {
            return view( 'pages.frontend.main' );
        } else {
            $token = $request->cookie( 'token' );
            $result = JWTToken::verifyJwtToken( $token );
            $user = User::where( 'id', $result->userId )->where( 'email', $result->userEmail )->where( 'role', 'customer' )->first();
            return view( 'pages.frontend.main', [
                'user' => $user,
            ] );
        }

    }

    function dashboard() {
        return view( 'pages.dashboard.dashboard-pages' );
    }

    function car() {
        return view( 'pages.dashboard.car' );
    }

    function register() {
        return view( 'pages.Auth.registration-page' );
    }

    function login() {
        return view( 'pages.Auth.login' );
    }

    function forget() {
        return view( 'pages.Auth.forget' );
    }

    function contact() {
        return view( 'pages.frontend.contact' );
    }

    function about() {
        return view( 'pages.frontend.about' );
    }

    function rantals() {
        return view( 'pages.frontend.about' );
    }
}