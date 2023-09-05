<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'category'];

    public function scopeFilter($query)
    {
        if (request('keyword')) {
            return $query->where('title', 'like', '%' . request('keyword') . '%')
                ->orWhere('body', 'like', '%' . request('keyword') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
