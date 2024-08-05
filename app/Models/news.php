<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class news extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'news';
    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'views'
    ];
    public function images()
    {
        return $this->hasMany(image_url::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    protected $dates = ['deleted_at'];
}
