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

    public function userHistory() {
        return $this -> belongsToMany(User::class);
    }

    public function comments() {
        return $this -> hasMany(Comment::class) -> whereNull('parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = static::generateUniqueSlug($news->title);
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) 
                $news->slug = static::generateUniqueSlug($news->title, $news->id);
        });
    }

    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        // Tạo slug cơ bản từ tiêu đề
        $slug = Str::slug($title);
        $count = 0;

        while (true) {
            // Tạo slug mới với số đếm (nếu cần)
            $newSlug = $count ? "{$slug}-{$count}" : $slug;

            // Query kiểm tra slug đã tồn tại chưa
            $query = static::where('slug', $newSlug);
            
            // Bỏ qua bài viết hiện tại nếu đang cập nhật
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            // Nếu slug chưa tồn tại, trả về slug này
            if (!$query->exists()) {
                return $newSlug;
            }

            $count++;
        }
    }
}

// edit comment + updating slug + route:slug 