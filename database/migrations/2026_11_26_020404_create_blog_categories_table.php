<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('order_column')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $existingCategories = DB::table('posts')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category');

        $order = 1;
        foreach ($existingCategories as $catName) {
            $name = trim((string) $catName);
            if ($name === '') {
                continue;
            }
            $slug = Str::slug($name);
            DB::table('blog_categories')->insertOrIgnore([
                'name' => $name,
                'slug' => $slug ?: 'category-'.$order,
                'order_column' => $order++,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
