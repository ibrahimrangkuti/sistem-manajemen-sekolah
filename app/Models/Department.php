<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['teacher'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
