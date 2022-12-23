<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerRestockMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $message;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $subject = 'Contact Us Message';
        $address = 'info@beautykink.com';
        $subject = $this->data['subject'];
        // $email = $this->data['email'];
        // $body = $this->data['body'];

        return $this->markdown('emails.CustomerRestockEmail')
        ->from($address)
        ->replyTo($address)
        ->subject($subject)
        ->with(['MsgToCustomer' => $this->data['body'],'CustomerEmail'=>$this->data['email'],'link'=>$this->data['url'],'MsgSubj'=>$subject]);
    }
}
