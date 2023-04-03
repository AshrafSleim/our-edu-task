<?php

namespace App\Jobs;

use App\Services\UploadTransactionService;
use App\Services\UploadUserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $user_data;
    private $transaction_data;
    public function __construct($user_data,$transaction_data)
    {
        $this->user_data=$user_data;
        $this->transaction_data=$transaction_data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        UploadUserService::uplodeData(json_decode($this->user_data)->users);
        UploadTransactionService::uplodeData(json_decode($this->transaction_data)->transactions);
    }
}
