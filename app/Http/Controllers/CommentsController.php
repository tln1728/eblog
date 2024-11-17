<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function reply(Request $request, $newsId, $cmtId)
    {
        $request->validate([
            'reply_content' => 'required',
            'parent_id' => 'exists:comments,id',
        ]);
        
        Comment::create([
            'content'   => $request -> reply_content,
            'user_id'   => Auth::id(),
            'news_id'   => $newsId,
            'parent_id' => $cmtId,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required',
            'parent_id' => 'nullable',
        ]);
        
        Auth::user() -> comments() -> create([
            'content' => $request -> content,
            'news_id' => $newsId,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
