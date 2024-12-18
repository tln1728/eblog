<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;
    const ROLE_AUTHOR = 2;

    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_BANNED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $attributes = [
        'profile' => 'images/default-avatar.jpg',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                return 'Active';

            case self::STATUS_BANNED:
                return 'Banned';
                
            case self::STATUS_INACTIVE:
                return 'Inactive';
        }
    }

    public function getStatusClassAttribute()
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                return 'badge badge-primary';

            case self::STATUS_BANNED:
                return 'badge badge-warning';
                
            case self::STATUS_INACTIVE:
                return 'badge badge-danger'; 
        }
    }

    public function news() {
        return $this -> hasMany(News::class);
    }

    public function comments() {
        return $this -> hasMany(Comment::class);
    }

    public function histories() {
        return $this -> hasMany(History::class);
    }

    public function newsHistory() {
        return $this -> belongsToMany(News::class,'histories');
    }

    public function addToHistory(News $news)
    {
        $this -> histories() -> updateOrCreate(
            ['news_id' => $news -> id],
            ['viewed_at' => now()]
        );
    }
}
