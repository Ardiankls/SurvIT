<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new job();
        $job->job_name = 'Tidak ada';
        $job->save();

        $job = new job();
        $job->job_name = 'Murid';
        $job->save();

        $job = new job();
        $job->job_name = 'Mahasiswa';
        $job->save();

        $job = new job();
        $job->job_name = 'Karyawan';
        $job->save();

        $job = new job();
        $job->job_name = 'Pemilik Bisnis';
        $job->save();
    }
}
