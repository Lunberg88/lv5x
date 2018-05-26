<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CandidateAppliedToOpening extends Notification
{
    use Queueable;

    protected $candidate_id;

    protected $candidate_fio;

    protected $opening_title;

    protected $opening_id;

    /**
     * CandidateAppliedToOpening constructor.
     * @param int $candidate_id
     * @param string $candidate_fio
     * @param string $opening_title
     * @param int $opening_id
     */
    public function __construct(int $candidate_id, string $candidate_fio, string $opening_title, int $opening_id)
    {
        $this->candidate_id = $candidate_id;
        $this->candidate_fio = $candidate_fio;
        $this->opening_title = $opening_title;
        $this->opening_id = $opening_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'candidate_id' => $this->candidate_id,
            'candidate_fio' => $this->candidate_fio,
            'opening_title' => $this->opening_title,
            'opening_id' => $this->opening_id
        ];
    }
}
