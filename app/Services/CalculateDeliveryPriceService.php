<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\CalculateDeliveryPriceRequest;
use App\Models\Company;
use App\Models\Currency;

class CalculateDeliveryPriceService
{
    public function handleRequest(CalculateDeliveryPriceRequest $request): mixed
    {
        $data = $request->all();

        if (isset($data['currency_id'])) {
            $currency = Currency::findOrFail($data['currency_id']);
        } else {
            $currency = Currency::getDefaultCurrency();
        }

        $weight = (float)$data['weight'];
        $pricePerWeight = Company::findOrFail($data['company_id'])->getPriceForWeight($weight, $currency);

        return [
            'price' =>  $this->calculate($pricePerWeight, $weight),
            'currency' => $currency->toArray()
        ];
    }

    public function calculate(float $pricePerWeight, float $weight): Float
    {
        return $pricePerWeight * $weight;
    }
}
