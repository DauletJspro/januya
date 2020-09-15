<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Users extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    const ADMIN = 1;
    const CLIENT = 2;
    const MODERATOR = 3;

    const USER_SEVEN_PERCENT = [2,3,4,5];    

//    use SoftDeletes;
//    protected $dates = ['deleted_at'];


    public static function parentFollowers($parent_id)
    {
        return Users::where(['recommend_user_id' => $parent_id])->get();
    }


    public static function getUserStatus($user_status)
    {
        $status =  UserStatus::where('user_status_id',$user_status )->first();
        return $status->user_status_name;
    }

    public static function isEnoughStatuses($parent_id, $status_id)
    {
        $followerStatusIds = [];
        $followers = Users::where(['recommend_user_id' => $parent_id])->get();

        foreach ($followers as $follower) {
            if ($follower->status_id >= $status_id) {
                array_push($followerStatusIds, $follower->status_id);
            }
        }
        $followerStatusIds = array_filter($followerStatusIds);
        if (count($followerStatusIds) >= 5) {
            return true;
        }
        return false;
    }
}
