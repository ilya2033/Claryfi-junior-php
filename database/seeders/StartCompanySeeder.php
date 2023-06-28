<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = array(
            array('name' => 'TransCompany'),
            array('name' => 'PackGroup'),
        );

        DB::table('companies')->insert($companies);
    }
}
