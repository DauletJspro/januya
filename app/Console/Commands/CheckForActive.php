<?php

namespace App\Console\Commands;

use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Console\Command;

class   CheckForActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:chactive';

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

        $users = Users::whereDate('created_at', date('Y-m-d'))->get();
        foreach ($users as $user) {
            if (!count($user->packets)) {
                $user->delete();
            }
        }
    }
}
