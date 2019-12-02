<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPages extends Controller
{
    public function getHome() {
      return view('staticPages.home');
    }

    public function getHelp() {
      return view('staticPages.help');
    }
}
