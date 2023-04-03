<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;

class UploadTransactionService
{
    public static function uplodeData($transaction_data)
    {
        foreach ($transaction_data as $transaction) {
            $check_user = User::where('email', $transaction->parentEmail)->first();
            $check_transaction = Transaction::where('parent_identification', $transaction->parentIdentification)->first();

            if (is_null($check_user) || !is_null($check_transaction)) {
                continue;
            }
            $new_transaction = new Transaction();
            $new_transaction->user_id = $check_user->id;
            $new_transaction->paid_amount = $transaction->paidAmount;
            $new_transaction->currency = $transaction->Currency;
            $new_transaction->status_code = Transaction::$status[$transaction->statusCode];
            $new_transaction->payment_date = $transaction->paymentDate;
            $new_transaction->parent_identification = $transaction->parentIdentification;
            $new_transaction->save();
        }
        return true;
    }
}
