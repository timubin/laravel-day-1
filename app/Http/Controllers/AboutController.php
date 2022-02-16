<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutus(){
        echo "<h1>This is About Page</h1> <a href='/'>Back to home</a>";
    }
}
