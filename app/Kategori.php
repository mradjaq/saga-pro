<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'kategori', 'slug'
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
