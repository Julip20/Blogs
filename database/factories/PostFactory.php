<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return[
        'user_id' => User::factory()->create()->id,
        'title' => $this->faker->sentence(),
        'post_image' => $this->faker->imageUrl('900','300'),
        'body' => $this->faker->paragraph(),
       ];
    }
}
