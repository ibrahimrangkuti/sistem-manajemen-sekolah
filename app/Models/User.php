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

    protected $with = ['class'];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function ekskul()
    {
        return $this->hasMany(Extracurricular::class);
    }

    public function presences()
    {
        return $this->hasMany(StudentPresence::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function isParent()
    {
        return $this->student_id !== null && $this->role === 'ortu';
    }

    public function student()
    {
        return $this->belongsTo($this, 'student_id');
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function sub_messages()
    {
        return $this->hasMany(SubMessage::class, 'sender_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sub_comments()
    {
        return $this->hasMany(SubComment::class);
    }
}
