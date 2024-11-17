<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return view('admin.news.index', [
            // 'news' => $user -> news() -> with(['categories:id,title','user:id,name']) -> latest('id') -> paginate(10),
            'news' => News::with(['categories:id,title','user:id,name']) -> latest('id') -> paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.news.create',[
            'cats' => Category::pluck('title', 'id'),
        ]);
    }

    public function store(StoreNewsRequest $request)
    {
        DB::beginTransaction();
        
        try {
            $data = $request -> validated();
            
            // xu ly anh
            $thumbnailPath = null;
            if ($request -> hasFile('thumbnail')) {
                $thumbnailPath = $request -> file('thumbnail') -> store('thumbnails');
                $data['thumbnail'] = $thumbnailPath;
            }

            /** @var \App\Models\User $user */
            $user = Auth::user();
            $news = $user -> news() -> create($data);

            // thêm vào bảng pivot category_news
            $news -> categories() -> attach($data['category']);
            
            DB::commit();

            return redirect() -> route('news.index')->with('success', 'Thêm tin thành công');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect() -> back() -> with(['error' => $e->getMessage()]);
        }
    }

    public function show(News $news)
    {
        $comments = $news->comments()->latest('id')->paginate(8);
        
        return view('client.single-post',[
            'new' => $news,
            'comments' => $comments,
        ]);
    }

    public function edit(News $news)
    {
        Gate::authorize('update',$news);
        
        $selectedCategory = $news -> categories -> pluck('id') -> toArray();

        return view('admin.news.edit',[
            'cats' => Category::pluck('title', 'id'),
            'selectedCategory' => $selectedCategory,
            'new' => $news,
        ]);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        DB::beginTransaction();
        
        try {
            $data = $request -> validated();

            // xu ly anh
            $thumbnailPath = null;
            if ($request -> hasFile('thumbnail')) {

                $thumbnailPath = $request -> file('thumbnail') -> store('thumbnails');
                $data['thumbnail'] = $thumbnailPath;

            } else $data['thumbnail'] = $news -> thumbnail;
            // ---
            
            $news -> update($data);
            
            $news -> categories() -> sync($data['category']);

            DB::commit();

            return redirect() -> route('news.index')->with('success', 'Sửa tin thành công');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect() -> back() -> with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect() -> route('news.index')
        ->with('success', 'Xóa tin thành công.');
    }
}
