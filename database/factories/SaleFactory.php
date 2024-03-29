<?php

namespace Database\Factories;

use App\Models\Agf;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{

    protected $model = Sale::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $agf = Agf::factory()->create();

        return [
            'agf_id' => $agf->id,
            'date' => $this->faker->date(),
            'expiration_date' => $this->faker->date(),
            'nf' => $this->faker->randomNumber(),
        ];
    }

}
