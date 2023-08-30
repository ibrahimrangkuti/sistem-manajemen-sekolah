<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPresence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['class', 'student'];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
