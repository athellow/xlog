<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid', 'name', 'title', 'level', 'description', 'order',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
