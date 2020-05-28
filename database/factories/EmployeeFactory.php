<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use \App\Employee;
use  App\Position;
use Faker\Generator as FakerGenerator;
use Illuminate\Support\Str;

$faker = new FakerGenerator();
$faker->addProvider(new Faker\Provider\en_US\Person($faker));
$faker->addProvider(new Faker\Provider\Internet($faker));
$faker->addProvider(new Faker\Provider\DateTime($faker));

$formats = phoneFormats();
$admin_id = getAdminId();

$factory->define(Employee::class, function (FakerGenerator $faker) use ($formats, $admin_id) {

    $position_id = Position::inRandomOrder()->first()->id;
    $gender = $faker->randomElement(['male', 'female']);
    $first_name = $faker->firstname($gender);
    $last_name = $faker->lastname($gender);
    $full_name = $first_name . ' ' . $last_name;
    $email = strtolower(Str::slug($full_name, '.')) . '@' . $faker->freeEmailDomain();
    $phone = $faker->numerify($faker->randomElement($formats));
    $salary = $faker->numberBetween(300, 1000);
    $employed_at = $faker->dateTimeBetween('-10 years', 'now', 'Europe/Kiev');

    return [
        'position_id' =>  $position_id,
        'full_name' => $full_name,
        'email' => $email,
        'phone' => $phone,
        'salary' => $salary,
        'employed_at' => $employed_at,
        'admin_created_id' => $admin_id,
        'admin_updated_id' => $admin_id,
    ];
});


function getAdminId()
{
    return User::whereHas('role', function ($q) {
        $q->where('roles.slug', 'admin');
    })->inRandomOrder()->first()->id;
}

function phoneFormats()
{
    $codes = config('phone.code', ['050']);
    $format = config('phone.format', '38{code}#######');
    $cnt = is_array($codes) ? count($codes) - 1 : 0;

    $arr = [];
    foreach (range(0, $cnt) as $index) {
        $arr[$index] = str_replace('{code}', $codes[$index], $format);
    }
    return $arr;
}
