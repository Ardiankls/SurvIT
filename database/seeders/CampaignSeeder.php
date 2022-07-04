<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\campaign;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new campaign();
        $status->campaign = 'Verify Email';
        $status->description = 'Telah verifikasi email';
        $status->point = 500;
        $status->is_ongoing = '1';
        $status->save();

        $status = new campaign();
        $status->campaign = 'Fill Demography';
        $status->description = 'Melengkapi demografi';
        $status->point = 500;
        $status->is_ongoing = '1';
        $status->save();

        $status = new campaign();
        $status->campaign = 'Bonus';
        $status->description = 'Bonus';
        $status->point = 0;
        $status->is_ongoing = '1';
        $status->save();
    }
}
