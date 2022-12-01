<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Referral;
use App\Models\Student;
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

        foreach (range(1, 6) as $val) {

            $institution_id = Institution::factory()->create([
                "zone_id" =>  Zone::factory()->create()->id
            ])->id;

            Referral::factory()->create([
                "institution_id" => $institution_id
            ]);;

            Student::factory()->create(
                [
                    "institution_id" => $institution_id
                ]
            );
        }
    }
}
