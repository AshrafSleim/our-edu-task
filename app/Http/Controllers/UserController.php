<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserTransactions(Request $request){
        $users_transactions = User::whereHas('transactions' , function ($query) use ($request) {
            $this->filterTransaction($query,$request);
        })->with(['transactions' => function ($query) use ($request) {
            $this->filterTransaction($query,$request);
        }])->get();
        return response()->json(['status' => true, 'message' => "successful get data", 'data'=>$users_transactions], 200);
    }


    public function filterTransaction( $query, Request $request){
        if ($request->has('status_code')) {
            $query->whereIn('status_code', $request->status_code);
        }
        if ($request->has('currency')) {
            $query->whereIn('currency', $request->currency);
        }
        if ($request->has('min_amount')) {
            $query->where('paid_amount', '>=', $request->min_amount);
        }
        if ($request->has('max_amount')) {
            $query->where('paid_amount', '<=', $request->max_amount);
        }
        if ($request->has('start_date')) {
            $query->where('payment_date', '>=', $request->start_date);
        }
        if ($request->has('end_date')) {
            $query->where('payment_date', '<=', $request->end_date);
        }
        return $query;
    }

}
