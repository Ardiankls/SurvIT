<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Blast_New_Survey implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $survey;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($survey)
    {
        $this->survey = $survey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function handle()
    {
        $survey = $this->survey;
        $users = User::where('id', '>', 8)->get();
        $uid = [];

        //AGE
        foreach ($users as $user){
            $age = date_diff(date_create($user->birthdate), date_create('now'))->y;
            if($survey->age_from <= $age && $survey->age_to >= $age){
                $uid[] = $user->id;
            }
        }

        $users = User::whereIn('id', $uid);

        //INTERESTS
        foreach ($survey->interests as $interest){
            $si[] = $interest->id;
        }
        if($si[0] != 1){
            $users = $users->whereHas('interests', function($query) use($si) {
                $query->whereIn('interest_id', $si);
            });
        }

        //JOBS
        foreach ($survey->jobs as $job){
            $sj[] = $job->id;
        }
        if($sj[0] != 1){
            $users = $users->whereHas('jobs', function($query) use($sj) {
                $query->whereIn('job_id', $sj);
            });
        }

        //PROVINCE
        foreach ($survey->provinces as $province){
            $sp[] = $province->id;
        }
        if($sp[0] != 1){
            $users = $users->whereIn('province_id', $sp);
        }

        //GENDER
        if($survey->gender_id != 1){
            $users = $users->where('gender_id', $survey->gender_id);
        }

        $targets = $users->get();
        // dd($targets);

        $input['subject'] = 'Ada Survei Baru Buat Kamu';

        foreach ($targets as $key => $value) {
            $input['email'] = $value->email;
            $input['name'] = $value->name;
            Mail::send('mail.blast_new_survey', [], function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });
        }
    }
}
