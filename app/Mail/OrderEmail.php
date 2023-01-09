<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email_body;
    public $template;
    public $cart;
    public $shipping;
    public $shipping_info;
    public $grand_total;
    public $invoice;
  
    public function __construct($email_body,$template,$cart,$shipping,$grand_total,$shipping_info,$invoice)
    
    {
        $this->email_body =    $email_body;
        $this->template =      $template;
        $this->cart =          $cart;
        $this->shipping =      $shipping;
        $this->shipping_info = $shipping_info;
        $this->grand_total =   $grand_total;
        $this->invoice =      $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = DB::table('settings')->first()->email_from;
        $subject = $this->template['subject'];

        return $this->view('emails.OrderEmail')
        ->from($address)
        ->replyTo($address)
        ->subject($subject)
        ->with(['msgBody' => $this->email_body,'cart'=>$this->cart,'template'=>$this->template,'shipping'=>$this->shipping,'grand_total'=>$this->grand_total,'shipping_info'=>$this->shipping_info,'invoice'=>$this->invoice]);

    }
}
