<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'user_id',
        'content',
        'summary',
        'thumbnail',
    ];

    public function categories() {
        return $this -> belongsToMany(Category::class);
    }

    public function user() {
        return $this -> belongsTo(User::class);
    }
}
