<?php

namespace App\Console\Commands;

use App\Models\Fond;
use App\Models\Operation;
use App\Models\UserOperation;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Console\Command;

class GlobalBonusBeginOfMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'globalBonus:everyMonth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This schedule will run method that send bonus from Global Diamond Found to users which have Diamond Director Status every begin of month';

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
        $globalDiamondFound = Fond::where(['fond_id' => Fond::GLOBAL_DIAMOND_FOUND])->first();
        $globalDiamondFoundMoney = $globalDiamondFound->fond_money;
        $diamondUsers = Users::where(['status_id' => UserStatus::DIAMOND_DIRECTOR])->get();
        $numberDiamondsUsers = count($diamondUsers);

        if ($numberDiamondsUsers) {
            $shareForEach = $globalDiamondFoundMoney / $numberDiamondsUsers;
            foreach ($diamondUsers as $user) {
                $user->user_money = $user->user_money + $shareForEach;
                $user->save();

                $operation = new UserOperation();
                $operation->author_id = null;
                $operation->recipient_id = $user->user_id;
                $operation->money = $shareForEach;
                $operation->operation_id = 1;
                $operation->operation_type_id = Operation::GlobalBonus;
                $operation->operation_comment = 'Глобальный бонус ' . $shareForEach . 'pv';
                $operation->save();
            }
        }



    }
}
