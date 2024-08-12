<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/** @extends Factory<Plan> */
class PlanFactory extends Factory
{
    /** @var class-string<Plan> */
    protected $model = Plan::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'stripe_id' => $this->faker->uuid(),
            'stripe_product_id' => $this->faker->uuid(),
            'nickname' => $this->faker->company(),
            'interval' => $this->faker->randomElement(['month', 'year']),
            'interval_count' => $count = $this->faker->numberBetween(
                int1: 1,
                int2: 12,
            ),
            'amount' => $this->faker->numberBetween(
                int1: 100,
                int2: 1000,
            ) * $count,
        ];
    }
}
