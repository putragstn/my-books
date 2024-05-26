<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function author()
    {
        return $this->hasMany(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
