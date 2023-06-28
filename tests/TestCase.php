<?php

namespace Tests;

use Database\Seeders\TestBaseSeederSet;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $seeder = TestBaseSeederSet::class;
    protected $seed = true;

    protected const API_COMPANY_URL = 'api/company';
    protected const API_DELIVERY_PRICE_URL = 'api/company/price';
}
