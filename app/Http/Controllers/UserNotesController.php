<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class UserNotesController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $notes = $user->notes()->get();
        return response()->success($notes);
    }
}
