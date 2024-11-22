<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index() {
        return view('admin.comments.index', [
            'comments' => Auth::user() -> comments() 
            -> with(['news:id,title,slug','parent']) 
            -> latest() 
            -> paginate(10),
        ]);
    }

    public function update(Request $request, $newsId, Comment $comment) {
        dd('update cmt', func_get_args());
    }

    public function updateReply(Request $request, $newsId, $cmtId) {
        dd('update reply', func_get_args());
    }

    public function destroy(Comment $comment) {
        dd($comment -> content);

        $comment->delete();

        return redirect() -> back() -> with('success', 'Xóa thành công.');
    }

    public function reply(Request $request, $newsId, $cmtId)
    {
        $request->validate([
            'reply_content' => 'required',
            'parent_id' => 'exists:comments,id',
        ]);
        
        Auth::user() -> comments() -> create([
            'content' => $request -> reply_content,
            'news_id' => $newsId,
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
