<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'url',
        'description',
        'thumbnail',
        'user_id',
    ];

     /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
