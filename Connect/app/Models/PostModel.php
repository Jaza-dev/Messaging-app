<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'idPost';
    protected $fillable = [
        'title',
        'text',
        'posted_at',
        'updated_at',
        'idUser',
        'likes',
        'dislikes'
    ];
}
