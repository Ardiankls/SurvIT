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
        $status->status = 'Tidak Diterima';
        $status->save();

        $status = new status();
        $status->status = 'Menunggu Validasi';
        $status->save();

        $status = new status();
        $status->status = 'Sukses';
        $status->save();

        $status = new status();
        $status->status = 'Menunggu Pembayaran';
        $status->save();

        $status = new status();
        $status->status = 'Pengecekan Pembayaran';
        $status->save();

        $status = new status();
        $status->status = 'Diberhentikan Sementara';
        $status->save();
    }
}
