<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\point_log;
use App\Models\User;
use App\Models\user_campaign;
use App\Models\user_log;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/usersurvey';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request){
        $user = User::find($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->markEmailAsVerified())
            event(new Verified($user));


        // POINT LOG
        if($user->email_verified_at == null){
            $user->update([
            'point' => $user->point + 500,
            ]);

            $ucampaign = user_campaign::create([
                'user_id' => $user->id,
                'campaign_id' => 1,
            ]);

            point_log::create([
                'type' => '0',
                'status_id' => '3',
                'point' => 500,
                'user_campaign_id' => $ucampaign->id,
            ]);
        }

        user_log::create([
            'table' => 'users, user_campaigns, point_logs',
            'user_id' => $user->id,
            'log_path' => 'VerificationController@verify',
            'log_desc' => $user->username . ' is verified',
        ]);

        return view('auth.verified');
        // return redirect($this->redirectPath())->with('verified', true);
    }
}
