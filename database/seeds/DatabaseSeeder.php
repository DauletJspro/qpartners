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
//        $this->call('SocialNetworkSeeder');
//        $this->call('InsetToAdministration');
        $this->call('InsertToLeadershipAdvice');
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

class SocialNetworkSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_networks')->insert([
            ['id' => 1, 'name' => 'instagram', 'fa_a_symbol' => 'fa fa-instagram'],
            ['id' => 2, 'name' => 'whatsapp', 'fa_a_symbol' => 'fa fa-whatsapp'],
            ['id' => 3, 'name' => 'twitter', 'fa_a_symbol' => 'fa fa-twitter'],
            ['id' => 4, 'name' => 'you_tube', 'fa_a_symbol' => 'fa fa-youtube'],
            ['id' => 5, 'name' => 'facebook', 'fa_a_symbol' => 'fa fa-facebook'],
            ['id' => 6, 'name' => 'google_mail', 'fa_a_symbol' => 'fa fa-google'],
            ['id' => 7, 'name' => 'mail_ru', 'fa_a_symbol' => 'fa fa-message'],
        ]);
    }
}

class InsetToAdministration extends Seeder
{
    public function run()
    {
        DB::table('administration')->insert([
            ['id' => 1, 'title' => 'default', 'text_body' => 'default text']
        ]);

        DB::table('ref_social_network_items')->insert([
            [
                'social_network_id' => \App\Admin\SocialNetwork::INSTAGRAM,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::ADMINISTRATION,
            ],
            [
                'social_network_id' => \App\Admin\SocialNetwork::FACEBOOK,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::ADMINISTRATION,
            ],
            [
                'social_network_id' => \App\Admin\SocialNetwork::TWITTER,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::ADMINISTRATION,
            ]
        ]);
    }
}

class InsertToLeadershipAdvice extends Seeder
{
    public function run()
    {
        DB::table('leadership_advice')->insert([
            ['id' => 1, 'title' => 'default', 'text_body' => 'default text']
        ]);

        DB::table('ref_social_network_items')->insert([
            [
                'social_network_id' => \App\Admin\SocialNetwork::INSTAGRAM,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::LEADERSHIP_ADVICE,
            ],
            [
                'social_network_id' => \App\Admin\SocialNetwork::FACEBOOK,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::LEADERSHIP_ADVICE,
            ],
            [
                'social_network_id' => \App\Admin\SocialNetwork::TWITTER,
                'item_id' => 1,
                'type_id' => \App\Admin\SocialNetwork::LEADERSHIP_ADVICE,
            ]
        ]);
    }
}

