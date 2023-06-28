<?php

namespace Tests\Feature\Traits;

trait CompanyTrait
{
    function getCalculateDeliveryPriceParamsValid()
    {
        return [
            'weight' => 30,
            'company_id' => 2,
        ];
    }

    function getCalculateDeliveryPriceParamsInvalid()
    {
        return [
            'weight' => -3,
            'company_id' => 999,
        ];
    }

    function getAllCompaniesResponseStructure()
    {
        return [
            'message',
            'data' => [
                '*' => [
                    'id',
                    'name',
                ],
            ],
            'status'
        ];
    }

    function getCalculateDeliveryPriceResponseStructure()
    {
        return [
            'message',
            'data' => [
                'price',
                'currency' => [
                    'id',
                    'name',
                    'code',
                    'symbol'
                ],
            ],
            'status'
        ];
    }
}
