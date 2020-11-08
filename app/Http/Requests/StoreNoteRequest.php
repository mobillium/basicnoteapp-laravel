<?php

namespace App\Http\Requests;

class StoreNoteRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
