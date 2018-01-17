<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auctions')->insert([
            [
                'user_id' => 1,
                'style' => 'Contemporary',
                'title' => 'Winter Landscape',
                'year' => 1879,
                'width' => 22,
                'height' => 32,
                'depth' => 77,
                'description' => 'Bla bla bla',
                'condition' => 'Ding dong biiiing',
                'origin' => 'Bla bla',
                'artist' => 'Paul Gauguin',
                'artwork_image_path' => 'storage/seeder_img/winter_landscape.jpeg',
                'signature_image_path' => 'storage/seeder_img/winter_landscape.jpeg',
                'optional_image_path' => null,
                'min_price' => '5000',
                'max_price' => '10000',
                'buyout_price' => '20000',
                'end_date' => '2018/02/14',
            ],
            [
                'user_id' => 1,
                'style' => 'Contemporary',
                'title' => 'Winter Morning',
                'year' => 1901,
                'width' => 11,
                'height' => 66,
                'depth' => null,
                'description' => 'Bla bla bla',
                'condition' => 'Ding dong biiiing',
                'origin' => 'Bla bla',
                'artist' => 'Ivan Choultsé',
                'artwork_image_path' => 'storage/seeder_img/winter_morning.jpeg',
                'signature_image_path' => 'storage/seeder_img/winter_morning.jpeg',
                'optional_image_path' => 'storage/seeder_img/winter_morning.jpeg',
                'min_price' => '15000',
                'max_price' => '21000',
                'buyout_price' => '86500',
                'end_date' => '2018/02/24',
            ],
            [
                'user_id' => 2,
                'style' => 'Contemporary',
                'title' => 'Hunters in the Snow',
                'year' => 1565,
                'width' => 55,
                'height' => 99,
                'depth' => null,
                'description' => 'Bla bla bla',
                'condition' => 'Ding dong biiiing',
                'origin' => 'Bla bla',
                'artist' => 'Pieter Bruegel the Elder',
                'artwork_image_path' => 'storage/seeder_img/hunters_in_the_snow.jpeg',
                'signature_image_path' => 'storage/seeder_img/hunters_in_the_snow.jpeg',
                'optional_image_path' => null,
                'min_price' => '100000',
                'max_price' => '200000',
                'buyout_price' => '500000',
                'end_date' => '2018/03/16',
            ],
            [
                'user_id' => 2,
                'style' => 'Contemporary',
                'title' => 'The Polar Sea',
                'year' => 1824,
                'width' => 505,
                'height' => 919,
                'depth' => 44,
                'description' => 'Bla bla bla',
                'condition' => 'Ding dong biiiing',
                'origin' => 'Bla bla',
                'artist' => 'Caspar David Friedrich',
                'artwork_image_path' => 'storage/seeder_img/the_polar_sea.jpeg',
                'signature_image_path' => 'storage/seeder_img/the_polar_sea.jpeg',
                'optional_image_path' => 'storage/seeder_img/the_polar_sea.jpeg',
                'min_price' => '100',
                'max_price' => '865',
                'buyout_price' => '1500',
                'end_date' => '2018/01/28',
            ],
        ]);
    }
}
