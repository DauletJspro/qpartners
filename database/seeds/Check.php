<?php

use App\Http\Helpers;
use Illuminate\Database\Seeder;

class Check extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            $ok = Helpers::send_mime_mail('info@roiclub.kz',
                'info@roiclub.kz',
                'hello',
                'sailauovdaulet15@gmail.com',
                'windows-1251',
                'UTF-8',
                'Новый пароль',
                view('mail.reset-password', 'sailauovdaulet15@gmail.com', ''),
                true);
        }catch (Exception $e){
            var_dump($e->getFile(). ' '. $e->getLine(). ' '. $e->getMessage() );
        }

    }
}
