<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;

class CalculateDeliveryPriceService
{
    public function handle(Company $company, int $weight): Float
    {
        return $company->getPriceForWeight($weight) * $weight;
    }

    public function handleRequest(Request $request): Float
    {
        $data = $request->all();
        return Company::findOrFail($data['company_id'])->getPriceForWeight($data['weight']) * $data['weight'];
    }
}
