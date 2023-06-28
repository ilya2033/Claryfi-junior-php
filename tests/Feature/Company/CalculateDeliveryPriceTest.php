<?php

namespace Tests\Feature\API\Company;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CompanyTrait;
use Tests\TestCase;

class CalculateDeliveryPriceTest extends TestCase
{
    use RefreshDatabase, CompanyTrait;

    public function test_error_response_on_invalid_params()
    {
        $this->postJson(self::API_DELIVERY_PRICE_URL, $this->getCalculateDeliveryPriceParamsInvalid())->assertStatus(422);
    }

    public function test_success_response_on_valid_params()
    {
        $this->postJson(self::API_DELIVERY_PRICE_URL, $this->getCalculateDeliveryPriceParamsValid())
            ->assertStatus(200)
            ->assertJsonStructure($this->getCalculateDeliveryPriceResponseStructure());
    }
}
