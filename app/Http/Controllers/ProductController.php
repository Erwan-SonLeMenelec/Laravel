<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TpController extends Controller
{
    public function index(): View {
        $posts = \App\Models\Post::paginate(1);
        return view('tp.index');
    }
    {
        User::create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('1234'),
        ]);
    }

};
