<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class EmployerVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
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

    public function toMail($notifiable)
    {
        // Generate a signed verification URL with id + hash
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addHours(24), // link valid for 24 hours
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage)
            ->subject('Welcome to Our Employer Portal - Verify Your Email')
            ->greeting('Hello ' . $notifiable->full_name . ',')
            ->line('Thank you for registering as an employer on our platform.')
            ->line('Please click the button below to verify your email and activate your account.')
            ->action('Verify Email', $verificationUrl)
            ->line('If you did not create an account, no further action is required.')
            ->salutation('Best regards, The Opol Employment System Team');
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

    /**
     * Generate the verification URL for the employer.
     *
     * @param object $notifiable
     * @return string
     */
    protected function verificationUrl(object $notifiable): string
    {
        return url(route('verification.verify', [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ], false));
    }

}
