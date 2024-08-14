<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pieces' => fake()->randomDigit(),
            'receipt_place' => fake()->creditCardDetails(),
            'issue_place' => fake()->creditCardDetails(),
            'report' => fake()->file(),
            'barcode' => fake()->ean13(),
            'warehouse_id' => Warehouse::factory(),
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
        ];
    }
}
