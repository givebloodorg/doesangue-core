<?php

namespace GiveBlood\Modules\Campaign\Database\Factories;

use Carbon\Carbon;
use GiveBlood\Modules\Campaign\Campaign;
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
    /**
     * @var class-string<Campaign>
     */
    protected $model = Campaign::class;

    /**
     * @return array<string, mixed>
     */
    protected function fields(): array
    {

        return [
        'title' => $this->faker->text(60),
        'description' => $this->faker->text(100),
        'due_date' => Carbon::now()->endOfYear(),
        'image' => $this->faker->imageUrl,
        'user_id' =>  fn() => factory(User::class)->make()->id,
        'slug' => $this->faker->slug
        ];
    }
}
