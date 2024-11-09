<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::with(['categories:id,title','user:id,name']) -> latest('id') -> paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create',[
            'cats' => Category::pluck('title', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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
            // ---
            $data['user_id'] = Auth::user() -> id;

            $news = News::create($data);

            // thêm vào bảng pivot category_news
            $news -> categories() -> attach($data['category']);
            
            DB::commit();

            return redirect() -> route('news.index')->with('success', 'Thêm tin thành công');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect() -> back() -> with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('client.single-post',[
            'new' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $selectedCategory = $news -> categories -> pluck('id') -> toArray();

        return view('admin.news.edit',[
            'cats' => Category::pluck('title', 'id'),
            'selectedCategory' => $selectedCategory,
            'new' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect() -> route('news.index')
        ->with('success', 'Xóa tin thành công.');
    }
}
