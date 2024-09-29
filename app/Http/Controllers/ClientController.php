<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }
}

// <?php

// namespace App\Http\Controllers;

// use App\Models\Category;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class ClientController extends Controller
// {
//     function index()
//     {
//         // banner
//         $mostViewPosts = DB::table('news')->orderByDesc('views')->limit(3)->get();

//         $latestNews = DB::table('news')->orderByDesc('id')->limit(4)->get();
//         // dd($latestNews);
//         return view('client.layout.index', compact('mostViewPosts', 'latestNews'));
//     }

//     function getPostIn(Category $category, $id)
//     {
//         $category = $category -> find($id); 
        
//         $title = $category -> title;
//         $allPosts = $category -> news() -> paginate(5);
    
//         return view('client.layout.category', compact('title', 'allPosts'));
//     }

//     function newsDetail($id)
//     {
//         $post = DB::table('news')->find($id);
//         return view('client.layout.news', compact('post'));
//     }

//     function testSearch()
//     {
//         $kw = $_POST['keyword'];
//         $title = 'Kết quả tìm kiếm cho: '. $kw;
//         $allPosts = DB::table('news')->where('title','like','%'.$kw.'%')->get();
//         return view('client.layout.category', compact('title', 'allPosts'));
//     }
// }
