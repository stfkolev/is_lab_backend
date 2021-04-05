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

    public function show($id) {
        return new AuthorResource(Author::with('books')->find($id));
    }
}
