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

    const CLIENT = 1;
    const CONSULTANT = 2;
    const MANAGER = 3;
    const DIRECTOR = 4;
    const BRONZE_DIRECTOR = 5;
    const SLIVER_DIRECTOR = 6;
    const GOLD_DIRECTOR = 7;
    const BRILLIANT_DIRECTOR = 8;

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public static function getStatusName($id)
    {
        $statusName = UserStatus::where(['user_status_id' => $id])->first();
        $statusName = $statusName ? $statusName->user_status_name : NULL;
        return $statusName;
    }
}
