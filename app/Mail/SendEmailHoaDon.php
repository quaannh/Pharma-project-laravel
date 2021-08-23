<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailHoaDon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $DonDatHang ;
    public function __construct($DonDatHang)
    {
        $this->subject('Đơn Đặt Hàng');
        $this->DonDatHang = $DonDatHang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyenhongquan060196@gmail.com','Công ty PHARMANQH')->view('emails.purchaseemail');
    }
}
