<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $products;
    public function __construct($user,$products)
    {
        $this->user=$user;
        $this->products=$products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user  = $this->user;
        $products=$this->products;
        return $this->view('admin.mail',compact('user','products'));
    }
}
