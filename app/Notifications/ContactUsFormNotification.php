<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramMessage;

class ContactUsFormNotification extends Notification
{
    use Queueable;

    protected array $data;
    protected string|null $filePath;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $data, string $filePath = null)
    {
        $this->data = $data;
        $this->filePath = $filePath;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
//            'mail',
            'telegram'
        ];
    }

    public function toTelegram($notifiable)
    {
        $message = "📩 *Новий контактний запит*\n";
        $message .= "👤 *Ім'я:* {$this->data['name']} \n";
        $message .= "📧 *Email:* {$this->data['e-mail']} \n";
        $message .= "📱 *Телефон:* {$this->data['phone']} \n";

        if (isset($this->data['comment']) && $this->data['comment'] !== null) {
            $message .= "📝 *Коментарій:* {$this->data['comment']} \n";
        }
//
//        if ($this->filePath) {
//            $telegram = TelegramFile::create()->document(Storage::path($this->filePath));
//        } else {
        $telegram = TelegramMessage::create();
//        }

        $telegram->to(config('services.telegram-bot-api.chat_id'));
        $telegram->content($message);

        return $telegram;
    }

    /**
     * Get the mail representation of the notification.
     */
//    public function toMail(object $notifiable): MailMessage
//    {
//        return (new MailMessage)
//            ->subject('Новий контактний запит')
//            ->greeting('Привіт!')
//            ->line("Ім'я: test")
//            ->line("Email: test")
//            ->line("Повідомлення: test")
//            ->salutation('Дякуємо!');
//    }

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
