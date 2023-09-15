<?php

namespace GiveBlood\Modules\Campaign\Database\Factories;

use Carbon\Carbon;
use GiveBlood\Modules\Campaign\Campaign;
use GiveBlood\Modules\Users\Database\Factories\UserFactory;
use GiveBlood\Modules\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CampaignFactory extends Factory
{
    /**
     * @var class-string<Campaign>
     */
    protected $model = Campaign::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
        'title' => $this->faker->text(60),
        'description' => $this->faker->text(100),
        'due_date' => Carbon::now()->endOfYear(),
        'image' => $this->faker->imageUrl,
        //'user_id' =>  fn() =>  factory(User::class)->make()->id,
        'user_id' =>  fn() =>  UserFactory::new()->create()->id,
        'slug' => $this->faker->slug
        ];
    }
}
