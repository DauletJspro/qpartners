<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PrepareDataBaseForTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\Users::whereNotNull('user_id')->get();
        foreach ($users as $user) {
            $user->user_money = 0;
            $user->status_id = null;
            $user->pv_balance = 0;
            $user->gv_balance = 0;
            $user->sv_balance = 0;
            $user->gap_status = null;
            $user->last_status = 0;
            $user->product_balance = 0;
            $user->save();
        }

        $userPackets = \App\Models\UserPacket::where(['is_active' => true])->get();

        foreach ($userPackets as $user_packet) {
            $user_packet->is_active = false;
            $user_packet->save();
        }

        DB::table('user_operation')->truncate();

//        $passiveUsersArray = [
//            'Iskak888' => \App\Models\Packet::BASPANA,
//            'Mehrinisa888' => \App\Models\Packet::BASPANA,
//            'sumbat7$' => \App\Models\Packet::BASPANA,
//            'turgan$$$' => \App\Models\Packet::BASPANA,
//            'Bagila888' => \App\Models\Packet::BASPANA,
//            'Esenkul888' => \App\Models\Packet::BASPANA_PLUS,
//            'balum888' => \App\Models\Packet::BASPANA_PLUS,
//            'Bulak' => \App\Models\Packet::BASPANA_PLUS,
//            'Mayira888' => \App\Models\Packet::BASPANA_PLUS,
//            'Kenhetai888' => \App\Models\Packet::BASPANA_PLUS,
//            'Nurbolat75' => \App\Models\Packet::TULPAR,
//            'NazgulB' => \App\Models\Packet::TULPAR,
//            'Ниетбаевна' => \App\Models\Packet::TULPAR_PLUS,
//            'Moldagali888' => \App\Models\Packet::TULPAR_PLUS,
//            'Nurlan888' => \App\Models\Packet::TULPAR_PLUS,
//            'Dmitri888' => \App\Models\Packet::TULPAR_PLUS,
//            'Mansia888' => \App\Models\Packet::QAMQOR,
//            'Zhanaiym' => \App\Models\Packet::JAS_OTAU
//
//        ];
//        $passiveUsers = \App\Models\Users::whereIn('login', [
//            'Iskak888', 'Mehrinisa888', 'sumbat7$', 'turgan$$$', 'Bagila888', 'Esenkul888', 'balum888',
//            'Bulak', 'Mayira888', 'Kenhetai888', 'Nurbolat75', 'NazgulB', 'Ниетбаевна', 'Moldagali888', 'Nurlan888',
//            'Dmitri888', 'Mansia888', 'Zhanaiym'
//        ])->get();
//        var_dump(($passiveUsers));


    }
}
