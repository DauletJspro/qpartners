<?php


use App\Model\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ReviewTypeSeeder');
        $this->command->info('Review table seeded successfully!');
    }
}

class ReviewTypeSeeder extends Seeder
{

    public function run()
    {
        DB::table('review_type')->insert([
            ['name' => 'отзыва для товара'],
            ['name' => 'отзывы для новостей'],
        ]);
    }

}
