<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\register;
use App\Comment;

class CommentsController extends Controller
{
    public function store(register $user)
    {
        $this->validate(request(),['body'=>'required|min:2']);
        $user->addComment(request('body'));
        return back();
    }
}
