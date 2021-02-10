<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\GAPController;
use App\Models\UserPacket;
use Illuminate\Console\Command;

class UnitTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unit:test';

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
        $user_packet = UserPacket::where(['user_packet_id' => 101])->first();
        app(GAPController::class)->send_group_sv($user_packet);
    }
}
