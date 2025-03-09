<?php

namespace App\Http\Controllers;

use App\Models\Meetup;
use App\Events\RegisterUser;
use App\Notifications\LoggedIn;
use Illuminate\Http\Request;
use App\Mail\SignupConfirmed;
use App\Notifications\NewSignUp;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterMeetupRequest;
use Illuminate\Support\Facades\Notification;

class MeetupController extends Controller
{
    public string $selectedMeetup = '';
    public string $name = '';
    public string $email = '';

    public function sendMail(Request $request)
    {
        event(new RegisterUser($request->user()));
    }

    public function sendNotification(Request $request)
    {
        Notification::send($request->user(), new LoggedIn($request));
    }

}
