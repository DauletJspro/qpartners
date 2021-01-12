<?php

use Illuminate\Database\Seeder;

class CategoryForTickets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('category_tickets')->truncate();
        \App\Models\CategoryTicket::create([
            'name' => 'Проблема с бонусами'
        ]);
        \App\Models\CategoryTicket::create([
            'name' => 'Проблема с верификации'
        ]);
        \App\Models\CategoryTicket::create([
            'name' => 'Проюлема с покупкой пакета'
        ]);

        \App\Models\CategoryTicket::create([
            'name' => 'Другое'
        ]);
    }
}
