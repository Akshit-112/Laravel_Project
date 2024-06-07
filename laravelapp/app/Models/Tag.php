<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Define the many-to-many relationship with Article
    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
