<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update,comment')->only(['edit', 'update', 'destroy']);
    }

    public function index() {
        $sort = request() -> get('sort', 'id');
        $direction = request() -> get('direction', 'desc');

        return view('admin.comments.index', [
            'comments' => Auth::user() -> comments() 
            -> with(['news:id,title,slug','parent.user']) 
            -> orderBy($sort,$direction)
            -> paginate(10),
        ]);
    }

    public function store(Request $request, News $news, $cmtId = null)
    {
        $request->validate([
            'content'   => 'required|max:5000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Auth::user() -> comments() -> create([
            'content'   => $request -> content,
            'news_id'   => $news -> id,
            'parent_id' => $cmtId,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment) {
        return view('admin.comments.edit',['cmt' => $comment]);
    }

    public function update(Request $request, Comment $comment) {
        $data = $request->validate([
            'content'   => 'required|max:5000',
        ]);

        $comment -> update($data);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return redirect() -> back() -> with('success', 'Xóa thành công.');
    }
}