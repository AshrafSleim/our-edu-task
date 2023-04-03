<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadDataRequest;
use App\Jobs\UploadDataJob;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadDataController extends Controller
{
    public function uploadData(UploadDataRequest $request){

        $users_json = file_get_contents($request->users_json);
        $transactions_json = file_get_contents($request->transactions_json);
        if (!Str::isJson($users_json) || !Str::isJson($transactions_json)) {
            return response()->json(['status' => false, 'message' => "the 2 files must be json data"], 200);
        }
        $job = new UploadDataJob($users_json,$transactions_json);
        dispatch($job);//dispatch Import job
        return response()->json(['status' => true, 'message' => "the data is uploaded now"], 200);

    }
}
