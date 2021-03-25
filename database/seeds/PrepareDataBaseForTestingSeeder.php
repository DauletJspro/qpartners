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
        ## Reset users balance and user packets
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

        ## GAP TO GAPHome

        $gapUserPackets = \App\Models\UserPacket::where('packet_id', \App\Models\Packet::GAP)->get();

        foreach ($gapUserPackets as $userPacket) {
            $userPacket->packet_id = \App\Models\Packet::GAPHome;
            $userPacket->save();
        }

        $gapHomeUserPackets = \App\Models\UserPacket::where('packet_id', \App\Models\Packet::GAPHome)->get();
        foreach ($gapHomeUserPackets as $gapHomeUserPacket) {
            $gapHomeUserPacket->packet_price = 300;
            $gapHomeUserPacket->save();
        }

        ## clear user operation database
        DB::table('user_operation')->truncate();
//
        $passiveUsersArray = [
            'Iskak888' => \App\Models\Packet::BASPANA,
            'Mehrinisa888' => \App\Models\Packet::BASPANA,
            'sumbat7$' => \App\Models\Packet::BASPANA,
            'turgan$$$' => \App\Models\Packet::BASPANA,
            'Bagila888' => \App\Models\Packet::BASPANA,
            'Esenkul888' => \App\Models\Packet::BASPANA_PLUS,
            'balum888' => \App\Models\Packet::BASPANA_PLUS,
            'bulak' => \App\Models\Packet::BASPANA_PLUS,
            'Mayira888' => \App\Models\Packet::BASPANA_PLUS,
            'Kenhetai888' => \App\Models\Packet::BASPANA_PLUS,
            'Nurbolat75' => \App\Models\Packet::TULPAR,
            'nazgulB' => \App\Models\Packet::TULPAR,
            'Ниетбаевна' => \App\Models\Packet::TULPAR_PLUS,
            'Moldagali888' => \App\Models\Packet::TULPAR_PLUS,
            'Nurlan888' => \App\Models\Packet::TULPAR_PLUS,
            'Dmitri888' => \App\Models\Packet::TULPAR_PLUS,
            'Mansia888' => \App\Models\Packet::QAMQOR,
            'Zhanaiym' => \App\Models\Packet::JAS_OTAU

        ];
        $passiveUsers = \App\Models\Users::whereIn('login', [
            'Iskak888', 'Mehrinisa888', 'sumbat7$', 'turgan$$$', 'Bagila888', 'Esenkul888', 'balum888',
            'bulak', 'Mayira888', 'Kenhetai888', 'Nurbolat75', 'nazgulB', 'Ниетбаевна', 'Moldagali888', 'Nurlan888',
            'Dmitri888', 'Mansia888', 'Zhanaiym'
        ])->get();


        ## add new packets to passive users
        foreach ($passiveUsers as $user) {
            $packet_id = $passiveUsersArray[$user->login];
            $packet = \App\Models\Packet::find($packet_id);
            if(isset($packet)){
                $userPacket = new \App\Models\UserPacket();
                $userPacket->user_id = $user->user_id;
                $userPacket->packet_id = $packet_id;
                $userPacket->packet_price = $packet->packet_price;
                $userPacket->created_at = date('Y-m-d H:i:s');
                $userPacket->updated_at = date('Y-m-d H:i:s');
                $userPacket->level = 1;
                $userPacket->is_active = 0;
                $userPacket->is_paid = 0;
                $userPacket->is_portfolio = 0;
                $userPacket->is_epay = 0;
                $userPacket->user_packet_type = 'item';
                $userPacket->packet_type = 1;
                $userPacket->save();

                $user->status_id = $packet->packet_status_id;
                $user->save();
            }

        }


    }
}
