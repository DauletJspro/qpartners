<?php

namespace App\Console\Commands;

use App\Models\GAP;
use App\Models\Packet;
use App\Models\Users;
use Illuminate\Console\Command;

class CheckForSocialBonusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:socialBonus';

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
        try {
            $users = Users::where(['is_activated' => true])
                ->join('user_packet', 'user_packet.user_id', '=', 'users.user_id')
                ->whereIn('user_packet.packet_id', Packet::actualPacketOnlyGaps())
                ->where(['user_packet.is_active' => true])
                ->get();

            $this->output->progressStart(count($users));
            foreach ($users as $user) {
                app(GAP::class)->check_for_premium($user->user_id);
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
        } catch (\Exception $exception) {
            var_dump($exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage());
        }

    }
}
