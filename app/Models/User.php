<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**{{  }}
     * The attributes that should be hidden {{ for  }}serialization.
     *{{  }}
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

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function ekskul()
    {
        return $this->hasMany(Extracurricular::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function presences()
    {
        return $this->hasMany(StudentPresence::class);
    }

    public function posts()
    {
        return $this->hasMany(PostForum::class);
    }
}
