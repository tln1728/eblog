<?php 

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public function compose(View $view)
    {
        // Lấy tất cả các danh mục từ database
        $categories = Category::limit(10) -> get();
        $view->with('categories', $categories);
    }
}