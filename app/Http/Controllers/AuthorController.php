<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{    
    public function index() {
        return AuthorResource::collection(Author::with('books')->paginate(25));
    }
}
