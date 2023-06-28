<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CalculateDeliveryPriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function calculatePrice(Request $request, CalculateDeliveryPriceService $service): JsonResponse
    {
        return response()->json([
            'message' => 'Delivery price',
            'data' => $service->handleRequest($request),
            'status' => 200
        ]);
    }
}
