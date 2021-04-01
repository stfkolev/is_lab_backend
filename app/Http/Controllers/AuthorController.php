<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\AuthorCollection;
use App\Models\Author;

class AuthorController extends Controller
{    
    public function index() {
        return new AuthorCollection(Author::all());
    }
}
