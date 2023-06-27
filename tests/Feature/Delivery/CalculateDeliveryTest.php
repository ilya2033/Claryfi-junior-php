<?php

namespace Tests\Feature\API\Delivery;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\DeliveryTrait;
use Tests\TestCase;

class CalculateDeliveryTest extends TestCase
{
    use RefreshDatabase, DeliveryTrait;

    public function test_error_response_on_invalid_params()
    {
        $this->postJson(self::API_DELIVERY_URL, $this->getCalculateDeliveryCostParamsInvalid())->assertStatus(400);
    }

    public function test_success_response_on_valid_params()
    {
        $this->postJson(self::API_DELIVERY_URL, $this->getCalculateDeliveryCostParamsValid())
            ->assertStatus(200)
            ->assertJsonStructure($this->getCalculateDeliveryCostResponseStructure());
    }
}
