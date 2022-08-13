<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryPost>
 */
class CategoryPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postcount=Post::all()->count();
        $categorycount=Category::all()->count();
        return [
            'category_id' => rand(1,$categorycount),
            'post_id' =>rand(1,$postcount),
        ];
    }
}
