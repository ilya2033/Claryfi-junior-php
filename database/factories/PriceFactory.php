<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $currencies = Currency::pluck('id')->toArray();
        $companies = Company::pluck('id')->toArray();

        if (!count($companies) || !count($currencies)) {
            return [];
        }

        $data = [
            'currency_id' => fake()->randomElement($currencies),
            'company_id' => fake()->randomElement($companies),
            'quantity' => 1,
            'price' => fake()->randomFloat(2, 1, 100)
        ];
        return $data;
    }
}
