<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new status();
        $status->status = 'Baru';
        $status->save();

        $status = new status();
        $status->status = 'Proses';
        $status->save();

        $status = new status();
        $status->status = 'Sukses';
        $status->save();
    }
}
