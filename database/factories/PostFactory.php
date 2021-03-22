<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        date_default_timezone_set("Europe/Belgrade");
        $today = date("Y-m-d H:i:s");
        $yesterday = date('Y-m-d H:i:s', strtotime($today. ' - 1 day'));

        $t = strtotime($today);
        $y = strtotime($yesterday);
        $rd = random_int($y,$t); //random timestamp between now and 1 day ago

        return [
            'body' => $this->faker->sentence(20),
            'user_id' => random_int(1,6),
            'created_at' => date("Y-m-d H:i:s", $rd),
            'updated_at' => date("Y-m-d H:i:s", $rd)
        ];
    }
}
