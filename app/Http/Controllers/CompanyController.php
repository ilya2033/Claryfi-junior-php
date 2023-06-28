<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateDeliveryPriceRequest;
use App\Models\Company;
use App\Services\CalculateDeliveryPriceService;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'All companies',
            'data' => Company::get(),
            'status' => 200
        ]);
    }

    public function calculatePrice(CalculateDeliveryPriceRequest $request, CalculateDeliveryPriceService $service): JsonResponse
    {
        return response()->json([
            'message' => 'Delivery price',
            'data' => $service->handleRequest($request),
            'status' => 200
        ]);
    }
}
