<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    
    protected $model = Post::class;

    public function definition()
    {
        return [
            'cover_image'   => $this->faker->imageUrl($width = 800, $height = 600),
            'title'         => $this->faker->sentence,
            'slug'          => Str::slug($this->faker->sentence),
            'body'          => $this->faker->paragraph(6),
            'category_id'   => mt_rand(1,3),
            'author_id'     => 1,
            'featured'      => 0,
            'published_at'  => now(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
