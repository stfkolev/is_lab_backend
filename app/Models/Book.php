<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genre() {
        return $this->hasOne(Genre::class);
    }

    public function publisher() {
        return $this->hasOne(Publisher::class);
    }

    public function readers() {
        return $this->belongsToMany(Reader::class);
    }
}
