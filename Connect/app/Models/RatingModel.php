<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    use HasFactory;

    protected $table = 'rating';
    protected $primaryKey = 'idRating';
    public $timesatmps = false;
    protected $fillable = [
        'idUser',
        'idPost',
        'like',
        'created_at'
    ];
}
