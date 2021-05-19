<?php

namespace App\Console\Commands;

use App\Models\Packet;
use App\Models\UserPacket;
use App\Models\Users;
use Illuminate\Console\Command;

class CorrectPassiveToActiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activation_bonus:passive_to_active';

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
        $toActivateUsers = Users::where(['is_activated' => false])
            ->where(['activated_date' => '2021-05-19 00:00:00'])->get();
        $this->output->progressStart(count($toActivateUsers));
        foreach ($toActivateUsers as $user) {
            $user->is_activated = true;
            $user->save();
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();


        $passiveUsersPackets = UserPacket::join('users', 'users.user_id', '=', 'user_packet.user_id')
            ->whereIn('user_packet.packet_id', Packet::actualPassivePackets())
            ->where(['user_packet.is_active' => true])
            ->where(['users.is_activated' => true])
            ->where(['users.activated_date' => '2021-05-19 00:00:00'])
            ->pluck('users.user_id')->toArray();

        $toPassiveUsers = Users::whereIn('user_id', $passiveUsersPackets)->get();
        $secondBar = $this->output;
        $secondBar->progressStart(count($toPassiveUsers));
        foreach ($toPassiveUsers as $passiveUser) {
            $passiveUser->is_activated = false;
            $passiveUser->save();
            $secondBar->progressAdvance();
        }
        $secondBar->progressFinish();

    }
}
