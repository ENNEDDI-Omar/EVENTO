<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisator_id' => function () {
                return \App\Models\Organisator::factory()->create()->id;
            },
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'date' => $this->faker->dateTimeBetween('now', '+5 days'),
            'capacity' => $this->faker->randomNumber(5, true),
            'available_seats' => $this->faker->randomNumber(3, true),
            'event_status' => $this->faker->randomElement(['accepted', 'pending', 'refused']),
            'reservation_type' => $this->faker->randomElement(['automatique', 'manuel']),
            'price' => $this->faker->randomNumber(3,true),
        ];
    }
}
