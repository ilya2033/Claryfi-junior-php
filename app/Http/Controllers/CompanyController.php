<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
}
