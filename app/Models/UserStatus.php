<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class UserStatus extends Model
{
    protected $table = 'user_status';
    protected $primaryKey = 'user_status_id';

    const PARTNER = 1;
    const MANAGER = 2;
    const DIRECTOR = 3;
    const SILVER_DIRECTOR = 4;
    const GOLD_DIRECTOR = 5;
    const RUBIN_DIRECTOR = 6;
    const SAPPHIRE_DIRECTOR = 7;
    const EMERALD_DIRECTOR = 8;
    const BRILLIANT_DIRECTOR = 9;

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public static function getStatusName($id)
    {

        $statusName = UserStatus::where(['user_status_id' => $id])->first();
        $statusName = $statusName ? $statusName->user_status_name : NULL;
        return $statusName;

    }
}
