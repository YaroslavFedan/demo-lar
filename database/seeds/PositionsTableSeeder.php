<?php


use App\User;
use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::truncate();

        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Company($faker));

        foreach (range(1,60) as $index) {

            $random_admin = $this->getRandomAdmin();
            Position::create([
                'name'=>$faker->unique()->jobTitle,
                'admin_created_id'=>$random_admin->id
            ]);
        }
    }

    protected function getRandomAdmin()
    {
        return User::whereHas('role', function ($q) {
            $q->where('roles.slug', 'admin');
        })
            ->inRandomOrder()
            ->first();
    }
}
