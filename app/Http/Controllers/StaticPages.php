<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StaticPages extends Controller
{
    public function getHome() {
      return view('staticPages.home');
    }

    public function getHelp() {
      return view('staticPages.help');
    }

    public function getUsers() {
      $users = User::paginate(10);
      return view('staticPages.users', ['users' => $users]);
    }
}
