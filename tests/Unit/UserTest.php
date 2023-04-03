<?php

namespace Tests\Unit;

use Database\Seeders\DatabaseSeeder;
use Database\Seeders\TransactionsSeeder;
use Database\Seeders\UserSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use  RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

//        $this->seed(UserSeeder::class);
//        $this->seed(TransactionsSeeder::class);
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_get_user_transactions()
    {
        $params = [
            'min_amount' => 280,
            'max_amount' => 500,
            'start_date' => '2021-11-30',
            'end_date' => '2022-09-07',
            'status_code' => ['authorized', 'decline'],
            'currency' => ['SAR', 'AED']
        ];
        $this->json('get', route('user.transactions', $params))
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ]);
    }


}
