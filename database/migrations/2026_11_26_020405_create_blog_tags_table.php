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
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        $posts = DB::table('posts')->whereNotNull('tags')->pluck('tags');
        $seen = [];
        foreach ($posts as $rawTags) {
            $decoded = json_decode((string) $rawTags, true);
            if (! is_array($decoded)) {
                continue;
            }
            foreach ($decoded as $tagName) {
                $name = trim((string) $tagName);
                $slug = Str::slug($name);
                if ($name === '' || $slug === '' || isset($seen[$slug])) {
                    continue;
                }
                $seen[$slug] = true;
                DB::table('blog_tags')->insertOrIgnore([
                    'name' => $name,
                    'slug' => $slug,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_tags');
    }
};
