<?php
namespace App\Services;
use App\Models\User;
use Carbon\Carbon;

class UploadUserService
{
    public static function uplodeData($user_data){
        foreach ($user_data as $user){
            $check_user = User::find($user->id);
            if ($check_user){
                continue;
            }
            $new_user = new User();
            $new_user->id= $user->id;
            $new_user->email= $user->email;
            $new_user->balance=$user->balance;
            $new_user->currency=$user->currency;
            $new_user->created_at=Carbon::createFromFormat('d/m/Y', $user->created_at)->format('Y-m-d H:i:s'); ;
            $new_user->save();
        }
        return true;
    }
}
