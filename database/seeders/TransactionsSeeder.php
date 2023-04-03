<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions_data = [
            [
                'user_id'=> '3fc2-a8d1',
                'paid_amount'=>'280.00',
                'currency'=>  'SAR',
                'status_code'=>'authorized',
                'payment_date'=>'2021-11-30',
                'parent_identification'=> 'd3d29d70-1d25-11e3-8591-034165a3a613'
            ],
            [
                'user_id'=> '4fc2-a8d1',
                'paid_amount'=>'200.50',
                'currency'=>  'USD',
                'status_code'=>'decline',
                'payment_date'=>'2018-01-01',
                'parent_identification'=> 'e3rffr-1d25-dddw-8591-034165a3a613'
            ],
            [
                'user_id'=> 'rrc2-a8d1',
                'paid_amount'=>'500.00',
                'currency'=>  'EGP',
                'status_code'=>'authorized',
                'payment_date'=>'2021-02-27',
                'parent_identification'=> '4erert4e-2www-wddc-8591-034165a3a613'
            ],
            [
                'user_id'=> 'sfc2-e8d1',
                'paid_amount'=>'400.00',
                'currency'=>  'AED',
                'status_code'=>'authorized',
                'payment_date'=>'2022-09-07',
                'parent_identification'=> 'd3dwwd70-1d25-11e3-8591-034165a3a613'
            ],
            [
                'user_id'=> '4fc3-a8d2',
                'paid_amount'=>'200.00',
                'currency'=>  'EUR',
                'status_code'=>'authorized',
                'payment_date'=>'2022-10-30',
                'parent_identification'=> 'd3d29d40-1d25-11e3-8591-034165a3a6133'
            ],
            [
                'user_id'=> '4ff3-a8d9',
                'paid_amount'=>'700.00',
                'currency'=>  'SAR',
                'status_code'=>'decline',
                'payment_date'=>'2021-11-30',
                'parent_identification'=> 't3d29d70-1d25-11e3-8591-034166a3a613'
            ],
            [
                'user_id'=> '3fc2-a8d1',
                'paid_amount'=>'150.00',
                'currency'=>  'SAR',
                'status_code'=>'decline',
                'payment_date'=>'2021-10-06',
                'parent_identification'=> 'd3d29d70-1d66-11e3-8591-034165a3a613'
            ],
            [
                'user_id'=> '9fr3-a8d9',
                'paid_amount'=>'200.00',
                'currency'=>  'SAR',
                'status_code'=>'decline',
                'payment_date'=>'2020-11-30',
                'parent_identification'=> 'bf533db0-f866-4aa2-9c00-55584f63419c'
            ],
            [
                'user_id'=> '4fc2-a8d1',
                'paid_amount'=>'100.50',
                'currency'=>  'USD',
                'status_code'=>'2018-05-01',
                'payment_date'=>'refunded',
                'parent_identification'=> '69863004-2739-4ada-bafc-eba18e400507'
            ],
        ];

        foreach ($transactions_data as $transaction){
            Transaction::create($transaction);
        }
    }
}
