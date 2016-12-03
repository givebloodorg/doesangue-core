
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * @var \Illuminate\Database\Eloquent\Factory
 */
$factory->define(
    DoeSangue\Models\User::class, function (Faker\Generator $faker) {
        static $password;

        return [
        'name' => $faker->name,
        'email' => $faker->unique()->companyEmail,
        'username' => $faker->userName,
        'phone' => $faker->tollFreePhoneNumber,
        'bio' => $faker->text($maxNbChars = 100),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        ];
    }
);

// Factory Doador
$factory->define(
    DoeSangue\Models\Donor::class, function (Faker\Generator $faker) {
        return [

        'user_id' => $faker->randomDigit,
        'blood_type_id' => $faker->randomDigit,
        ];
    }
);

// Factory Post
$factory->define(
    DoeSangue\Models\Post::class, function (Faker\Generator $faker) {
        return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'image' => $faker->imageUrl,
        'user_id' => 1,
        ];
    }
);

// Factory Campaigns
$factory->define(
    DoeSangue\Models\Campaigns::class, function (Faker\Generator $faker) {
        return [
        'title' => $faker->title,
        ];
    }
);

// BloodType factory
$factory->define(
    DoeSangue\Models\BloodType::class, function (Faker\Generator $faker) {
        return [
        'description' => $faker->title,
        'code' => $faker->randomDigit,
        ];
    }
);
