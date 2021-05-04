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
        $job->job_name = 'Student';
        $job->save();

        $job = new job();
        $job->job_name = 'College Student';
        $job->save();

        $job = new job();
        $job->job_name = 'Employee';
        $job->save();

        $job = new job();
        $job->job_name = 'Business Owner';
        $job->save();
    }
}
