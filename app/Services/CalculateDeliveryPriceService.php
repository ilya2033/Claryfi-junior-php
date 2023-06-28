<?php

namespace App\Services;

use App\Http\Requests\CalculateDeliveryPriceRequest;
use App\Models\Company;
use App\Models\Currency;

class CalculateDeliveryPriceService
{
    public function handle(Company $company, int $weight, Currency $currency = null): mixed
    {
        if (!$currency) {
            $currency = Currency::getDefaultCurrency();
        }
        return $company->getPriceForWeight($weight, $currency) * $weight;
    }

    public function handleRequest(CalculateDeliveryPriceRequest $request): mixed
    {
        $data = $request->all();

        if (isset($data['currency_id'])) {
            $currency = Currency::findOrFail($data['currency_id']);
        } else {
            $currency = Currency::getDefaultCurrency();
        }
        return [
            'price' => Company::findOrFail($data['company_id'])->getPriceForWeight($data['weight'], $currency) * $data['weight'],
            'currency' => $currency->toArray()
        ];
    }
}
