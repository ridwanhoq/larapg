<?php

namespace Database\Seeders;

use App\Models\Referral;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class CountTotalGroupBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach(range(1, 6) as $val){

            Referral::factory()->create([
                ""
            ]);

            Zone::factory()->count(20)->create()->id;

        }




    }
}
