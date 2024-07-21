<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'id',
        'new_id',
        'user_id',
        'vote_star',
        'comment'
    ];
}
