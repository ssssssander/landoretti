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
                'origin' => 'Paul Gauguin',
                'artwork_image_path' => 'uploads/artwork_images/kzNAJF8woR8cVHJRrPWozLHDMI7OGnfHLP8ze560.jpeg',
                'signature_image_path' => 'uploads/signature_images/J2e7t7mnrgY9n2ElA7uETvDeOhmassjf0fv1upUG.jpeg',
                'optional_image_path' => null,
                'min_price' => '5000',
                'max_price' => '10000',
                'buyout_price' => '20000',
                'end_date' => '2018/01/12',
            ],
            [
                'user_id' => 1,
                'style' => 'Contemporary',
                'title' => 'Winter Landscape with a Church',
                'year' => 1811,
                'width' => 11,
                'height' => 66,
                'depth' => null,
                'description' => 'Bla bla bla',
                'condition' => 'Ding dong biiiing',
                'origin' => 'Caspar David Friedrich',
                'artwork_image_path' => 'uploads/artwork_images/DrbrtSaBIATj4pUJuVr1O9mDk8e0VbYWZvFXBoUD.jpeg',
                'signature_image_path' => 'uploads/signature_images/Tnd7ht9WN8o3HWHkV6DmueFaLjYohb1FyIu8ghTJ.jpeg',
                'optional_image_path' => null,
                'min_price' => '15000',
                'max_price' => '21000',
                'buyout_price' => '86500',
                'end_date' => '2018/01/13',
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
                'origin' => 'Pieter Bruegel the Elder',
                'artwork_image_path' => 'uploads/artwork_images/fTz7581MjSflcH6OZZdwYT1UrxGdF77cAd5jWswt.jpeg',
                'signature_image_path' => 'uploads/signature_images/9S8otZZWTctslTEMvVyYtoTv9Kwno8OLXkr33y5V.jpeg',
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
                'origin' => 'Caspar David Friedrich',
                'artwork_image_path' => 'uploads/artwork_images/cflLl2DMA1PckJDmHkBU0p2eIyoJux19uS4c8cYq.jpeg',
                'signature_image_path' => 'uploads/signature_images/8QUtPUtPJQdHxaqbvJGqub386TDQSi9VfoTbYVJu.jpeg',
                'optional_image_path' => null,
                'min_price' => '100',
                'max_price' => '865',
                'buyout_price' => '1500',
                'end_date' => '2018/01/16',
            ],
        ]);
    }
}
