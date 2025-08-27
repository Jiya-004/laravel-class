<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'slug',
    ];

    protected $casts = [
        'content' => 'string',
        'user_id' => 'integer',
    ];

    protected $hidden = [
        'user_id',
    ];
}