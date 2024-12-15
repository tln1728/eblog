<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tạo 3 danh mục
        $cats = Category::factory(3) -> create();
        
        // và 10 bài viết gán cả 3 dm vừa tạo
        News::factory(10) -> hasAttached($cats) -> create();
    }
}
