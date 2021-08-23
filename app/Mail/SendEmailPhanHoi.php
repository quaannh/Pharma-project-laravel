<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailPhanHoi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $send_phan_hoi ;
    public function __construct($send_phan_hoi)
    {
        $this->subject('Gửi Phản Hồi');
        $this->send_phan_hoi = $send_phan_hoi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyenhongquan060196@gmail.com','Công ty PHARMANQH')->view('emails.phanhoiemail');
    }
}
