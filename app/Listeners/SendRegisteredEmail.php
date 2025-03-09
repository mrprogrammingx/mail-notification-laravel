<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\RegisterUser;
use App\Mail\SignupConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisteredEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(public readonly SignupConfirmed $signupConfirmed, public User $user)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterUser $event): void
    {
        Mail::to($event->user)
            ->cc($event->user)
            ->bcc($event->user)
            ->send(new SignupConfirmed($event->user));
    }
}
