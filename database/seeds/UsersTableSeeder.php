<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sander',
                'email' => 'sander.borret@hotmail.com',
                'password' => bcrypt('123456'),
                'country' => 'be',
                'zip' => '1234',
                'city' => 'Verweggistan',
                'address' => 'Dingdongstraat 7',
                'phone_number' => '+32123456789',
                'account_number' => '123456789',
                'vat_number' => '987654321',
                'alt_payment' => 'PayPal',
            ],
            [
                'name' => 'John',
                'email' => 'sander.borret@student.kdg.be',
                'password' => bcrypt('654321'),
                'country' => 'nl',
                'zip' => '4862',
                'city' => 'Nieuwpoort',
                'address' => 'Zimzamlaan 55',
                'phone_number' => '+31987654321',
                'account_number' => '765823647',
                'vat_number' => '268504609',
                'alt_payment' => 'Nee',
            ],
        ]);
    }
}
