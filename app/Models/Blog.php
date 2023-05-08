<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'body'];

    //子モデルがhasMany
    //親がbelongsTo

    // Categoryモデルを親モデルとして登録
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cats()
    {
        //多対多
        return $this->belongsToMany(Cat::class)->withTimestamps();
    }
}
