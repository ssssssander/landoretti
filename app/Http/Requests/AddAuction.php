<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddAuction extends FormRequest
{
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
            'style' => ['required', Rule::in(array_keys(trans('footer.styles')))],
            'title' => 'required|string|max:255',
            'year' => 'required|date_format:Y|max:4',
            'width' => 'required|digits_between:1,8',
            'height' => 'required|digits_between:1,8',
            'depth' => 'nullable|digits_between:1,8',
            'description' => 'required|string|max:10000',
            'condition' => 'required|string|max:10000',
            'origin' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'artwork_image' => 'required|image|max:10000',
            'signature_image' => 'required|image|max:10000',
            'optional_image' => 'nullable|image|max:10000',
            'min_price' => 'required|digits_between:1,8',
            'max_price' => 'required|digits_between:1,8',
            'buyout_price' => 'nullable|digits_between:1,8',
            'end_date' => 'required|date_format:d/m/y|after:today|max:8',
            'agree_tac' => 'accepted',
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
        $validator->after(function ($validator) {
            if($this->min_price && $this->max_price) {
                if($this->max_price <= $this->min_price) {
                    $validator->errors()->add('max_price',
                    trans('validation.custom.max_price.higher_than_min_price',
                    ['min_price' => formatPrice($this->min_price)]));
                }
            }

            if($this->buyout_price) {
                if($this->buyout_price <= $this->max_price) {
                    $validator->errors()->add('buyout_price',
                    trans('validation.custom.buyout_price.higher_than_max_price',
                    ['max_price' => formatPrice($this->max_price)]));
                }
            }
        });
    }
}
