<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactFormNotification extends Notification
{
    protected $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Notifikasi melalui email dan database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Anda memiliki pengiriman formulir kontak baru.')
            ->line('Nama: ' . $this->contact['name'])
            ->line('Email: ' . $this->contact['email'])
            ->line('Subjek: ' . $this->contact['subject'])
            ->line('Pesan: ' . $this->contact['message'])
            ->action('Lihat Pengiriman', url('/'))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    public function toArray($notifiable)
    {
        return [
            'name' => $this->contact['name'],
            'email' => $this->contact['email'],
            'subject' => $this->contact['subject'],
            'message' => $this->contact['message'],
        ];
    }
}
