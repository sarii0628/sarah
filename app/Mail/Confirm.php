<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Confirm extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $total;
    protected $title;
    protected $text;
    protected $items;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name = "ぷー", $total = "1000", $items)
    {
        //
        $this->title = sprintf('%sさま　購入確認＆支払い案内(Sarah)', $name);

        $this->name  = $name;
        $this->total = $total;
        $this->items = $items;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirm')
                    ->text('emails.confirm_plain')
                    ->subject($this->title)
                    ->with([
                        'name' => $this->name,
                        'total' => $this->total,
                        'items' => $this->items,
                    ]);
    }
}
