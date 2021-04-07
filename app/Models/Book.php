<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'genre_id',
        'publisher_id',
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function readers() {
        return $this->belongsToMany(Reader::class)->withTimestamps();
    }
}
