<?php

use Illuminate\Database\Seeder;

class AddPassivPakcetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::JASTAR,
            'packet_name_ru' => 'Jastar',
            'packet_image' => '',
            'packet_price' => 120,
            'is_show' => true,
            'sort_num' => 9,
            'packet_css_color' => '55b83f',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::JASTAR,
            'packet_type' => true,
            'send_sv' => 1,
            'is_upgrade_packet' => false,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::QAMQOR,
            'packet_name_ru' => 'Qamqor',
            'packet_image' => '',
            'packet_price' => 120,
            'is_show' => true,
            'sort_num' => 10,
            'packet_css_color' => '00758a',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::QAMQOR,
            'packet_type' => true,
            'send_sv' => 1,
            'is_upgrade_packet' => false,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::JAS_OTAU,
            'packet_name_ru' => 'Jas Otau',
            'packet_image' => '',
            'packet_price' => 240,
            'is_show' => true,
            'sort_num' => 11,
            'packet_css_color' => 'FE408A',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::JAS_OTAU,
            'packet_type' => true,
            'send_sv' => 2,
            'is_upgrade_packet' => false,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::QOLDAU,
            'packet_name_ru' => 'Qoldau',
            'packet_image' => '',
            'packet_price' => 240,
            'is_show' => true,
            'sort_num' => 12,
            'packet_css_color' => 'a83255',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::QOLDAU,
            'packet_type' => true,
            'send_sv' => 2,
            'is_upgrade_packet' => false,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::BASPANA_PLUS,
            'packet_name_ru' => 'Baspana plus',
            'packet_image' => '',
            'packet_price' => 480,
            'is_show' => true,
            'sort_num' => 13,
            'packet_css_color' => 'FFFF00',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::BASPANA_PLUS,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => false,
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::BASPANA,
            'packet_name_ru' => 'Baspana',
            'packet_image' => '',
            'packet_price' => 480,
            'is_show' => true,
            'sort_num' => 14,
            'packet_css_color' => '66ff33',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::BASPANA,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => false,
        ]);


        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::TULPAR_PLUS,
            'packet_name_ru' => 'Tulpar plus',
            'packet_image' => '',
            'packet_price' => 480,
            'is_show' => true,
            'sort_num' => 15,
            'packet_css_color' => '4d79ff',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::TULPAR_PLUS,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => false,
        ]);
        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::TULPAR,
            'packet_name_ru' => 'Tulpar',
            'packet_image' => '',
            'packet_price' => 480,
            'is_show' => true,
            'sort_num' => 16,
            'packet_css_color' => 'ff751a',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_status_id' => \App\Models\UserStatus::TULPAR,
            'packet_type' => true,
            'send_sv' => 5,
            'is_upgrade_packet' => false,
        ]);
    }
}
