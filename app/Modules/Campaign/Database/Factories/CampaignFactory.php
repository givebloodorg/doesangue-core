<?php

namespace GiveBlood\Modules\Campaign\Database\Factories;

use GiveBlood\Modules\Users\User;
use GiveBlood\Support\Database\ModelFactory;

/*
|--------------------------------------------------------------------------
| User Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class CampaignFactory extends ModelFactory
{
    protected $model = Campaign::class;

    protected function fields()
    {

        return [
        'title' => $faker->text(60),
        'description' => $faker->text(100),
        'expires' => \Carbon\Carbon::now()->endOfYear(),
        'image' => $faker->imageUrl,
        'user_id' =>  function () {
            return factory(GiveBlood\Modules\Users\User::class)->create()->id;
        },
        'slug' => $faker->slug
        ];
    }
}
