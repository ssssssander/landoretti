<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBid extends FormRequest
{
    public $amountOfBids;
    public $latestBidPrice;
    public $minPrice;
    public $buyoutPrice;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bid_price' => 'required|digits_between:1,8',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $this->amountOfBids = $this->route('auction')->bids->count();
        $this->minPrice = $this->route('auction')->min_price;
        $this->buyoutPrice = $this->route('auction')->buyout_price;


        $validator->after(function ($validator) {
            if($this->bid_price) {
                if($this->amountOfBids > 0) {
                    $this->latestBidPrice = $this->route('auction')->bids()->orderBy('created_at', 'desc')->first()->price;
                    if($this->bid_price <= $this->latestBidPrice) {
                        $validator->errors()->add('bid_price',
                        trans('validation.custom.bid_price.higher_than_latest_bid_price',
                        ['latest_bid_price' => formatPrice($this->latestBidPrice)]));
                    }
                }

                if($this->bid_price < $this->minPrice) {
                    $validator->errors()->add('bid_price',
                        trans('validation.custom.bid_price.higher_than_or_equal_to_min_price',
                        ['min_price' => formatPrice($this->minPrice)]));
                }

                if($this->buyoutPrice) {
                    if($this->bid_price >= $this->buyoutPrice) {
                        $validator->errors()->add('bid_price',
                        trans('validation.custom.bid_price.lower_than_buyout_price',
                        ['buyout_price' => formatPrice($this->buyoutPrice)]));
                    }
                }
            }
        });
    }
}
