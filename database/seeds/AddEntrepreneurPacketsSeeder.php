<?php

use Illuminate\Database\Seeder;

class AddEntrepreneurPacketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::STANDART,
            'packet_name_ru' => 'Standart',
            'packet_image' => '',
            'packet_price' => 60,
            'is_show' => true,
            'sort_num' => 17,
            'packet_css_color' => '2285E3',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Возможность добавлять свою GAP карточку в список!',
            'packet_status_id' => null,
            'packet_type' => true,
            'send_sv' => 0,
            'is_upgrade_packet' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::TOP_3,
            'packet_name_ru' => 'Top 3',
            'packet_image' => '',
            'packet_price' => 120,
            'is_show' => true,
            'sort_num' => 18,
            'packet_css_color' => '00758a',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Возможность предпринимателю выводить первые три  место в общем списке дисконтных карточек.',
            'packet_status_id' => null,
            'packet_type' => true,
            'send_sv' => 0,
            'is_upgrade_packet' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\Packet::insert([
            'packet_id' => \App\Models\Packet::VIP_BANNER,
            'packet_name_ru' => 'Vip banner',
            'packet_image' => '',
            'packet_price' => 60,
            'is_show' => true,
            'sort_num' => 19,
            'packet_css_color' => '4d79ff',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Возможность добавить изображение компании в слайдер который расположен снизу header-a.',
            'packet_status_id' => null,
            'packet_type' => true,
            'send_sv' => 0,
            'is_upgrade_packet' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
