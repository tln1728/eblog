<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort = request() -> get('sort', 'id');
        $direction = request() -> get('direction', 'desc');
        
        return view('admin.category.index', [
            'categories' => Category::withCount('news') 
            -> orderBy($sort, $direction) 
            -> simplePaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => 'required | unique:categories',
        ],
        [
            'title.required' => 'Không được để trống',
            'title.unique'   => 'Tiêu đề đẫ tồn tại',
        ]);
        
        Category::create($data);

        return redirect() -> route('category.index') 
        -> with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('client.category', [
            'category' => $category,
            'news'     => $category -> news() -> latest('id') -> paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request -> validate([
            'title' => 'required | unique:categories,title,'.$category -> id,
        ],
        [
            'title.required' => 'Không được để trống',
            'title.unique'   => 'Tiêu đề đã tồn tại',
        ]);

        $category->update($data);

        return redirect() -> route('category.index') 
        -> with('success', 'Category update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect() -> route('category.index')
        ->with('success', 'Xóa danh mục thành công.');
    }
}
