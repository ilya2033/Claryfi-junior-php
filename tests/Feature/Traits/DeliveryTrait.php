<?php

namespace Tests\Feature\Traits;

trait DeliveryTrait
{
    function getCalculateDeliveryCostParamsValid()
    {
        return [
            'weight' => 30,
            'company' => 2,
        ];
    }

    function getCalculateDeliveryCostParamsInvalid()
    {
        return [
            'weight' => -3,
            'company' => 999,
        ];
    }

    function getDeliveryCompaniesResponseStructure()
    {
        return [
            'message',
            'data' => [
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],

                ],
            ],
            'status'
        ];
    }

    function getCalculateDeliveryCostResponseStructure()
    {
        return [
            'message',
            'data' => [
                'data' => [
                    'price'
                ],
            ],
            'status'
        ];
    }
}
