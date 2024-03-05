<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('dashboard', [
            'statements' => $request->user()
                ->statements()
                ->orderBy('created_at', 'DESC')
                ->paginate(4),
        ]);
    }

    public function newStatement(Request $request) {
        return view('newStatement');
    }

    public function createStatement(Request $request) {
        $request->validate([
            'carNumber' => ['required', 'string', 'min:8', 'license_plate'],
            'description' => ['required', 'string']
        ]);

        Statement::create([
            'user_id' => $request->user()->id,
            'license_plate' => $request->carNumber,
            'description' => $request->description,
        ]);

        return redirect('dashboard');
    }
}
