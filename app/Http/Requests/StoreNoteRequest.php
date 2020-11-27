<?php

namespace App\Http\Requests;

class StoreNoteRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'note' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title'    => __('app.note.title'),
            'note' => __('app.note.note'),
        ];
    }
}
