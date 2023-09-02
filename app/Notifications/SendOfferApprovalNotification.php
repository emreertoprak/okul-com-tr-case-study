<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\File;
use Twilio\Rest\Client;

class SendOfferApprovalNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    public function toTwilio($notifiable)
    {
        $twilioClient = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $phoneNumber = $notifiable->phone_number; // Assuming you have a 'phone_number' field in your notifiable model

        // Send the SMS via Twilio
        $twilioClient->messages->create(
            $phoneNumber,
            [
                'from' => config('services.twilio.from'),
                'body' => 'Your offer has been approved.'
            ]
        );
    }

    public function toFile($notifiable)
    {
        // Save SMS information to a local file in other environments
        File::append(storage_path('sms.log'), 'SMS to: ' . $notifiable->phone_number . ' - Message: Your offer has been approved');
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
