<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Illuminate\Support\Facades\Auth;

class Packet extends Model
{
    protected $table = 'packet';
    protected $primaryKey = 'packet_id';


    use SoftDeletes;

    protected $dates = ['deleted_at'];

    const SMALL = 1; //Bronze
    const MEDIUM = 2; // Silver
    const LARGE = 3; // Gold
    const VIP = 4; //VIP


    const BRONZE = 1;
    const SILVER = 2;
    const GOLD = 3;

    const VIP_ECONOMY = 5;
    const VIP_STANDARD = 6;
    const VIP_PREMIUM = 7;

    const VIP_ECONOMY_PERCENT = 15/100;
    const VIP_STANDARD_PERCENT = 30/100;
    const VIP_PREMIUM_PERCENT = 50/100;


    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_packet', 'packet_id', 'user_id')->where('is_activate', true);
    }

    public static function actualPacket()
    {
        return [
            self::SMALL,
            self::MEDIUM,
            self::LARGE,
            self::VIP,
        ];
    }


    public static function limit($user)
    {
        $messageBody = '';
        $success = true;
        $userId = $user->user_id;
        $userStatus = $user->user_status;
        $availableBonuses = [1, 32, 22];
        $monday = date('Y-m-d H:i:s', strtotime('monday this week'));
        $sunday = date('Y-m-d H:i:s', strtotime('sunday this week'));
        $firstDay = date('Y-m-d H:i:s', strtotime('first day of this month'));
        $lastDay = date('Y-m-d H:i:s', strtotime('last day of this month'));

        $incomeForMonth = UserOperation::where(['recipient_id' => $userId])
            ->where(['operation_type_id' => $availableBonuses])
            ->whereBetween(['created_at', [$firstDay, $lastDay]])
            ->get();

        $incomeWeek = UserOperation::where(['recipient_id' => $userId])
            ->where(['operation_type_id' => $availableBonuses])
            ->whereBetween('created_at', [$monday, $sunday])
            ->get();

        $incomeForMonth = collect($incomeForMonth);
        $incomeForMonth = $incomeForMonth->map(function ($item) {
            return $item->money;
        });

        $incomeForMonth = array_map($incomeForMonth->all());

        $incomeWeek = collect($incomeWeek);
        $incomeWeek = $incomeWeek->map(function ($item) {
            return $item->money;
        });
        $incomeWeek = array_sum($incomeWeek->all());

        switch ($userStatus) {
            case UserStatus::CONSULTANT;
                if ($incomeWeek >= 50) {
                    $messageBody = 'Ваш лимит на неделю не превышает 50$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 200) {
                    $messageBody = 'Ваш лимит на неделю не превышает 200$. ';
                    $success = false;
                }
                break;
            case UserStatus::AGENT:
                if ($incomeWeek >= 250) {
                    $messageBody = 'Ваш лимит на неделю не превышает 250$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 1000$. ';
                    $success = false;
                }
                break;
            case UserStatus::MANAGER:
                if ($incomeWeek >= 250) {
                    $messageBody = 'Ваш лимит на неделю не превышает 500$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 2 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::BRONZE_MANAGER:
                if ($incomeWeek >= 1000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 1000$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 4000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 4 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::SILVER_MANAGER:
                if ($incomeWeek >= 1500) {
                    $messageBody = 'Ваш лимит на неделю не превышает 1000$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 6000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 4 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::GOLD_MANAGER:
                if ($incomeWeek >= 2000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 2 000$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 8000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 8 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::SAPPHIRE_DIRECTOR:
                if ($incomeWeek >= 4000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 4 000$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 16000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 16 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::DIAMOND_DIRECTOR:
                if ($incomeWeek >= 25000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 25 000$. ';
                    $success = false;
                }
                if ($incomeForMonth >= 100000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 100 000$. ';
                    $success = false;
                }
                break;
        }
        return [
            'message' => $messageBody,
            'success' => $success,
        ];
    }

    public static function limitBonus($user, $inviterPacketId)
    {
        $messageBody = '';
        $success = true;
        $userId = $user->user_id;
        $userStatus = $user->user_status;
        $availableBonuses = [1, 32, 22];
        $firstDay = date('Y-m-d H:i:s', strtotime('first day of this month'));
        $lastDay = date('Y-m-d H:i:s', strtotime('last day of this month'));

        $incomeForMonth = UserOperation::where(['recipient_id' => $userId])
            ->where(['operation_type_id' => $availableBonuses])
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->get();

        $incomeForMonth = collect($incomeForMonth);
        $incomeForMonth = $incomeForMonth->map(function ($item) {
            return $item->money;
        });

        $incomeForMonth = array_sum($incomeForMonth->all());

        switch ($inviterPacketId) {
            case Packet::SMALL;
                if ($incomeForMonth >= 200) {
                    $messageBody = 'Ваш лимит на месяц не превышает 200$. ';
                    $success = false;
                }
                break;
            case Packet::MEDIUM:
                if ($incomeForMonth >= 500) {
                    $messageBody = 'Ваш лимит на месяц не превышает 500$. ';
                    $success = false;
                }
                break;
            case Packet::LARGE:
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на месяц не превышает 1000$. ';
                    $success = false;
                }
                break;
        }
        return [
            'message' => $messageBody,
            'success' => $success,
        ];
    }

    public function userPacket()
    {
        $this->hasMany('App\Models\UserPacket');
    }

    public static function hasPacket($packet_id)
    {
        return count(UserPacket::where(['packet_id' => $packet_id, 'user_id' => Auth::user()->user_id])->get());
    }
}
