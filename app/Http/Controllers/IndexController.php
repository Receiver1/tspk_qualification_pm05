<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('dashboard', [
            'statements' => $request->user()->statements()->paginate(4),
        ]);
    }
}
