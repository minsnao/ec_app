<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    public function getImageUrlAttribute()
{
    return Str::startsWith($this->image, 'http')
        ? $this->image
        : asset('storage/' . $this->image);
}

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function categories() 
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    } 

    public function likedItems()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    protected $fillable = [
        'user_id',
        'title',
        'condition',
        'price',
        'image',
        'description',
        'brand',
    ];
}