<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(Request $request) {
        return view('adminPanel', [
            'statements' => Statement::orderBy('created_at', 'DESC')
                ->paginate(4),
        ]);
    } 

    public function changeStatus(Request $request, Statement $statement) {
        $field = $request->validate([
            'status' => ['required', 'string', 'in:created,confirmed,denied']
        ]);

        $statement->status = $request->status;
        $statement->save();

        return Redirect::back();
    }
}
