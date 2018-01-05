<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country', 'zip', 'city', 'address', 'phone_number', 'account_number', 'vat_number', 'alt_payment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function auctions() {
        return $this->hasMany('App\Auction');
    }

    public function bids() {
        return $this->hasMany('App\Bid');
    }

    public function watchlist() {
        return $this->hasOne('App\Watchlist');
    }
}
