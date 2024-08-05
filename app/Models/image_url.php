<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_url extends Model
{
    use HasFactory;
    protected $table = 'image_url';
    protected $fillable = [
        'id',
        'img_url',
        'news_id',
        'image_type',

    ];
    public function news()
    {
        return $this->belongsTo(news::class);
    }
}
