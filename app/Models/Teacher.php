<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function class()
    {
        return $this->hasOne(Classes::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }
}
