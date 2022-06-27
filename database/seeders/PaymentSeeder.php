<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder = [
            'payment_name' => 'COD',
            'payment_number' => 0,
            'payment_owner' => '',
        ];

        Payment::create($seeder);
    }
}
