<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lead>
 */
class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => '0812'.fake()->numerify('########'),
            'email' => fake()->safeEmail(),
            'company' => fake()->company(),
            'truck_series' => 'SHACMAN X3000 Series',
            'quantity' => '1 - 2 Unit',
            'location' => fake()->city(),
            'notes' => fake()->sentence(),
            'source' => 'homepage',
            'status' => 'new',
        ];
    }
}
