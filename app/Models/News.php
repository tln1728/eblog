<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function comments() {
        return $this -> hasMany(Comment::class) -> whereNull('parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $slug = Str::slug($news->title);
            $count = News::where('slug', 'LIKE', "{$slug}%")->count();
            $news->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
