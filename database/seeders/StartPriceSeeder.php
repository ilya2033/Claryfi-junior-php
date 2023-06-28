<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transCompanyId = Company::where('name', 'TransCompany')->firstOrFail()->id;
        $packGroupId = Company::where('name', 'PackGroup')->firstOrFail()->id;
        $currencyEURId = Currency::where('code', 'EUR')->firstOrFail()->id;

        $prices = array(
            array('company_id' => $transCompanyId, 'quantity' => 1, 'cost' => 20, 'currency_id' => $currencyEURId),
            array('company_id' => $transCompanyId, 'quantity' => 10, 'cost' => 100, 'currency_id' => $currencyEURId),
            array('company_id' => $packGroupId, 'quantity' => 1, 'cost' => 1, 'currency_id' => $currencyEURId),
        );

        DB::table('prices')->insert($prices);
    }
}
