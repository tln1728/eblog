<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home',[
            'latestNews' => News::latest() -> paginate(10),
        ]);
    }

    function search_news()
    {
        $kw = request()->kw;

        // Trả về view với thông báo không có kết quả và không có bài viết nào
        if (empty($kw)) {
            return view('client.result', [
                'news'           => collect(),
                'totalNewsCount' => 0,
            ]);
        }
        
        // Sử dụng query builder thay vì trực tiếp vào Eloquent để dễ dàng xử lý
        $newsQuery = News::query();  

        if ($kw) {
            // Nếu có từ khóa, áp dụng tìm kiếm
            $newsQuery->where('title', 'like', '%' . $kw . '%');
        }

        // Lấy tổng số bài viết tìm được (không phân trang)
        $totalNewsCount = $newsQuery->count();  

        // Thực hiện phân trang với 10 kết quả mỗi trang
        $news = $newsQuery -> paginate(10) -> appends(['kw' => $kw]);

        return view('client.result', [
            'news' => $news,
            'kw' => $kw,
            'totalNewsCount' => $totalNewsCount,  // Truyền tổng số bài viết tìm được
        ]);
    }

    public function history() {
        return view('client.news.history',[
            'newsHistory' => auth() -> user() 
                -> newsHistory() 
                -> with('categories:id,title') 
                -> latest('viewed_at')
                -> paginate(15),
        ]);
    }
}
