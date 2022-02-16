<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index () {
        return "<h1>This is user Controller</h1> <a href='/'>Back to home</a>";
    }
}
