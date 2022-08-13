<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=fake()->unique()->sentence;
        $ispublished=['1','0'];
        return [
            'thumbnail'=>fake()->sentence,
            'name'=>fake()->name,
            'slug' => str::slug($title),
            'is_published'=>$ispublished[rand(0,1)],
        ];
    }
}
