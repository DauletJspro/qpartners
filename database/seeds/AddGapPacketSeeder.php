<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGapPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::GAPTechno,
            'packet_name_ru' => 'GAP Techno',
            'packet_image' => '',
            'packet_price' => 60,
            'is_show' => true,
            'sort_num' => 6,
            'packet_css_color' => '2285E3',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение Qyran ACADEMY + 10 Продукт + Back office',
            'packet_status_id' => \App\Models\UserStatus::ACTIV_1,
            'packet_type' => true,
            'send_sv' => 1,
            'is_upgrade_packet' => true,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::GAPAuto,
            'packet_name_ru' => 'GAP Auto',
            'packet_image' => '',
            'packet_price' => 120,
            'is_show' => true,
            'sort_num' => 7,
            'packet_css_color' => 'FFFF00',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение Qyran ACADEMY + 10 Продукт + Back office',
            'packet_status_id' => \App\Models\UserStatus::ACTIV_2,
            'packet_type' => true,
            'send_sv' => 2,
            'is_upgrade_packet' => true,
        ]);


        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::GAPHome,
            'packet_name_ru' => 'GAP Home',
            'packet_image' => '',
            'packet_price' => 300,
            'is_show' => true,
            'sort_num' => 8,
            'packet_css_color' => 'a89332',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение Qyran ACADEMY + 10 Продукт + Back office',
            'packet_status_id' => \App\Models\UserStatus::ACTIV_3,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => true,
        ]);

        DB::table('packet')->where(['packet_id' => \App\Models\Packet::GAP])->delete();

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::GAP,
            'packet_name_ru' => 'GAP',
            'packet_image' => '',
            'packet_price' => 300,
            'is_show' => true,
            'sort_num' => 9,
            'packet_css_color' => 'a83255',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение Qyran ACADEMY + 10 Продукт + Back office',
            'packet_status_id' => \App\Models\UserStatus::PASSIV,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => true,
        ]);
    }
}
