<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->references('id')
                ->on('users');
            $table->float('paid_amount')->default(0.0);
            $table->string('currency')->default('EGP');
            $table->enum('status_code',['authorized','decline','refunded'])->default('authorized');
            $table->date('payment_date');
            $table->string('parent_identification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
