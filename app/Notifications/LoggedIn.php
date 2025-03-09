<?php

namespace App\Notifications;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Stevebauman\Location\Facades\Location;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LoggedIn extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Request $request)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $country = ($position = Location::get()) ? $position->countryName : "UNKNOWN";

        return (new MailMessage)
            ->line('Dear ' . ucfirst($notifiable->name))
            ->line('There is a new logged in on your account.')
            ->line('Time of logged in: '. now())
            ->line('IP Address: ' . $this->request->ip())
            ->line('Device: ' . $this->request->header('User-Agent'))
            ->line('Location: ' . $country)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
