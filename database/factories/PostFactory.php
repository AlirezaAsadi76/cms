<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
//            'user_id' => rand(1,5),
            'title' => $title,
            'slug' => str::slug($title),
            'sub_title' =>fake()->sentence, // password
            'details' => fake()->paragraph,
            'post_type'=>'post',
            'is_published'=>$ispublished[rand(0,1)],
            'created_at'=>now(),
            'updated_at'=>now(),

        ];
    }
}
