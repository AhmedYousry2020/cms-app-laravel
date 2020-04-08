<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index')->with([
            'users_count'=>  \App\User::all()->count(),
            'categories_count'=> \App\categories::all()->count(),
            'posts_count'=> \App\post::all()->count()
        ]);
    }
}
