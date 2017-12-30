<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'style', 'title', 'year', 'width', 'height', 'depth', 'description', 'condition', 'origin', 'artwork_image_path', 'signature_image_path', 'optional_image_path', 'min_price', 'max_price', 'buyout_price', 'end_date',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
