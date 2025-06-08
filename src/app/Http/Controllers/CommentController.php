<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Item;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $itemId){
        $validated = $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->item_id = $itemId;
        $comment->body = $validated['body'];
        $comment->save();

        return redirect()->back();
    }
}
