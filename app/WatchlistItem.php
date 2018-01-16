<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    protected $fillable = [
        'user_id', 'auction_id',
    ];
}
