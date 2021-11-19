<?php

namespace Selene\Modules\RodoModule\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PopupMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $text;
    public $hours;

    public function __construct($name, $phone = null, $email = null, $text = null, $hours = null)
    {
        $this->name  = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->text  = $text;
        $this->hours = $hours;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('selene.rodo')['mail_title'])
            ->from(env('MAIL_USERNAME'))
            ->view('RodoModule::mail')
            ->with([
                'name'  => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'text'  => $this->text,
                'hours' => $this->hours,
            ]);
    }
}
