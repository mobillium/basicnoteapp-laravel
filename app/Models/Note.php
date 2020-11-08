<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
