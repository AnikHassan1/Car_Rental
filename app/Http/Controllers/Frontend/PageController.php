<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function dashboard(){
        return view('pages.dashboard.dashboard-pages');
    }
    function car(){
        return view('pages.dashboard.car');
    }
    function register(){
        return view('pages.Auth.registration-page');
    }
    function login(){
        return view('pages.Auth.login');
    }
    function forget(){
        return view('pages.Auth.forget');
    }
    function contact(){
        return view('pages.frontend.contact');
    }
    function about(){
        return view('pages.frontend.about');
    }
    function rantals(){
        return view('pages.frontend.about');
    }
}
