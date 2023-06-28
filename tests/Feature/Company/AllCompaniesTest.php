<?php

namespace Tests\Feature\API\Company;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CompanyTrait;
use Tests\TestCase;

class AllCompaniesTest extends TestCase
{
    use RefreshDatabase, CompanyTrait;

    public function test_success_response()
    {
        $this->getJson(self::API_COMPANY_URL)
            ->assertStatus(200)
            ->assertJsonStructure($this->getAllCompaniesResponseStructure());
    }
}
