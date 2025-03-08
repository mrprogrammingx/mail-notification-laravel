<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterMeetupRequest;
use App\Models\Meetup;
use App\Notifications\NewSignUp;
use Illuminate\Http\Request;

class MeetupController extends Controller
{
    public string $selectedMeetup = '';
    public string $name = '';
    public string $email = '';

    public function register(RegisterMeetupRequest $request)
    {
        $data = $request->validated();

        $meetup = Meetup::find($data['selectedMeetup']);

        $meetup->organizer->notify(new NewSignUp($data['name'],$data['email']));
    }

    public function with()
    {
        return [

        ];
    }
}
