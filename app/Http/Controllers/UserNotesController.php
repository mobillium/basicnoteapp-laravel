<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class UserNotesController extends Controller
{

    public function store(Request $request)
    {
        $user = $request->user();
        $notes = $user->notes();
        return response()->success($notes);
    }
}
