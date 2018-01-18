<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuctionEnded extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $auctionTitle;
    public $latestBidPrice;
    public $hasHighestBid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $auctionTitle, $latestBidPrice, $hasHighestBid)
    {
        $this->userName = $userName;
        $this->auctionTitle = $auctionTitle;
        $this->latestBidPrice = $latestBidPrice;
        $this->hasHighestBid = $hasHighestBid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("{$this->auctionTitle} has ended")->markdown('emails.auction_ended');
    }
}
