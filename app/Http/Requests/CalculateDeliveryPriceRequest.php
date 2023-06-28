<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CalculateDeliveryPriceRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id' => ['required', 'exists:' . Company::class . ',id'],
            'weight' => ['required', 'numeric', 'min:1', 'max:1000'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => $validator->errors(),
            'data'      => null,
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
