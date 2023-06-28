<?php

namespace App\Services;

use App\Http\Requests\CalculateDeliveryPriceRequest;
use App\Models\Company;

class CalculateDeliveryPriceService
{
    public function handle(Company $company, int $weight): Float
    {
        return $company->getPriceForWeight($weight) * $weight;
    }

    public function handleRequest(CalculateDeliveryPriceRequest $request): Float
    {
        $data = $request->all();
        return Company::findOrFail($data['company_id'])->getPriceForWeight($data['weight']) * $data['weight'];
    }
}
