<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover_photo',
        'publish',
        'description',
        'source_url',
        'user_id',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}