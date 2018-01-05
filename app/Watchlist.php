<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = [
        'user_id', 'auction_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
