<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Ngasih Nilai Default Ke Atribut
    // protected $attributes = [
    //     'author_image'  => 'author-image.png'
    // ];
}
