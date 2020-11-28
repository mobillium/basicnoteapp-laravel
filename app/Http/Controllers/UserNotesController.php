<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotesController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $notes = $user->notes()->paginate(15);
        return response()->success($notes);
    }
}
