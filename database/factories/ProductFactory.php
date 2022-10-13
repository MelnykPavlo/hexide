<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $faker_ua;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker_ua = \Faker\Factory::create("uk_UA");
        return [
            'name' => $this->faker->name(),
            'name_ua' => $this->faker_ua->name(),
            'price' => $this->faker->randomFloat(null, 0, 10000),
            'description' => $this->faker->text(100),
            'description_ua' => $this->faker_ua->text(100),
            'image' => $this->faker->loremflickr("public/products/", 200, 200)
        ];
    }
}
