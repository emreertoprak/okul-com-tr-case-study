<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
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
    }

    public function toTwilio($notifiable)
    {
        $twilioClient = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $phoneNumber = +15005550010;

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
        $dateTime = date('Y-m-d H:i:s');
        $logMessage = $dateTime . ' - SMS to: ' . $notifiable->phone_number . ' - Message: Your offer has been approved';
        File::append(storage_path('sms.log'), $logMessage . "\n");
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [TwilioChannel::class];
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
