<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Users;
use App\Models\UserStatus;
use App\Models\UserPacket;
use App\Models\Packet;
class RewriteStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rewrite:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users_packet = UserPacket::where('packet_id', Packet::VIP)->get();
        foreach($users_packet as $user_packet) {
            $user = Users::where('user_id', $user_packet->user_id)->update(['soc_status_id' => UserStatus::VIP]);
        }        
    }
}
