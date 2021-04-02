<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';

    protected $fillable = [
        'title', 'slug', 'content', 'banner', 'category_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
