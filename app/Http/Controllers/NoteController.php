<?php

namespace App\Http\Controllers;

use App\Constants\SuccessCode;
use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }

    public function store(StoreNoteRequest $request)
    {
        $user = $request->user();
        $note = new Note($request->input());
        $note->user()->associate($user);
        $note->save();
        return response()->success($note);
    }

    public function show(Note $note)
    {
        return response()->success($note);
    }

    public function update(StoreNoteRequest $request, Note $note)
    {
        $note->fill($request->input());
        $note->save();
        return response()->success($note);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->success(null, SuccessCode::DELETE);
    }

}
