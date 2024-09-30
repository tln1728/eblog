<?php

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_news', function (Blueprint $table) {
            $table->foreignIdFor(News::class)       
                -> constrained() -> cascadeOnDelete() -> cascadeOnUpdate();

            $table->foreignIdFor(Category::class)   
                -> constrained() -> cascadeOnDelete() -> cascadeOnUpdate();

            $table->primary(['news_id', 'category_id']);
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_news');
    }
};
