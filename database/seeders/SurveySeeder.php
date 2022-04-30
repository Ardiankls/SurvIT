<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\survey;
use App\Models\survey_interest;
use App\Models\survey_job;
use App\Models\survey_province;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $survey = new survey();
        $survey->user_id = 5;
        $survey->title = 'Survei Produk XXX';
        $survey->link = 'https://docs.google.com/forms/d/e/1FAIpQLSeyQMGH7SWNiLevTWL0Hyqy-pbrs3D7WHTvgDoEdvBG32NZjw/viewform?usp=sf_link';
        $survey->edit_link = 'https://docs.google.com/forms/d/1FsWyuTM-fFHk0TNtD3POQ3Z6OV4oED1uG6dUoO0fh08/edit?usp=sharing';
        $survey->point = 50;
        $survey->url = '4849fc80f42e0707cf8fffe52beeeaf663798a23';
        $survey->shareable = '0';
        $survey->package_id = 1;
        $survey->status_id = 3;
        $survey->gender_id = 1;
        $survey->save();

        $sjobs = new survey_job();
        $sjobs->survey_id = 1;
        $sjobs->job_id = 1;
        $sjobs->save();

        $sinterests = new survey_interest();
        $sinterests->survey_id = 1;
        $sinterests->interest_id = 1;
        $sinterests->save();

        $sprovinces = new survey_province();
        $sprovinces->survey_id = 1;
        $sprovinces->province_id = 1;
        $sprovinces->save();

    }
}
