<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_data = [
            [
                'id' => "3fc2-a8d1",
                'email' => 'parent1@parent.eu',
                'balance' => '354.50',
                'currency' => 'SAR',
            ],
            [
                'id' => "4fc2-a8d1",
                'email' => 'parent2@parent.eu',
                'balance' => '1000.00',
                'currency' => 'USD',
            ], [
                'id' => "4fc3-a8d2",
                'email' => 'parent5@parent.eu',
                'balance' => '130.00',
                'currency' => 'EUR',
            ], [
                'id' => "4ff3-a8d9",
                'email' => 'parent6@parent.eu',
                'balance' => '900.00',
                'currency' => 'SAR',
            ], [
                'id' => "9fr3-a8d9",
                'email' => 'parent7@parent.eu',
                'balance' => '600.00',
                'currency' => 'SAR',
            ], [
                'id' => "rrc2-a8d1",
                'email' => 'parent3@parent.eu',
                'balance' => '560.00',
                'currency' => 'EGP',
            ], [
                'id' => "sfc2-e8d1",
                'email' => 'parent4@parent.eu',
                'balance' => '7000.00',
                'currency' => 'AED',
            ]
        ];
        foreach ($users_data as $user){
            User::create($user);
        }

    }
}
