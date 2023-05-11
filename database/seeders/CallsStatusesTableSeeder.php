<?php

namespace Database\Seeders;

use App\Models\CallStatus;
use Illuminate\Database\Seeder;

class CallsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CallStatus::create(['name_en' => 'Pending']);
        CallStatus::create(['name_en' => 'On Progress']);
        CallStatus::create(['name_en' => 'Canceled']);
        CallStatus::create(['name_en' => 'Rejected']);
        CallStatus::create(['name_en' => 'Finished']);
    }
}
