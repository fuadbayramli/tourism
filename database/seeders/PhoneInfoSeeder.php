<?php

namespace Database\Seeders;

use App\Models\PhoneInfo;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run(): void
    {
        $faker = Container::getInstance()->make(Generator::class);

        $noOfRows = 1000000;
        $range = range(1, $noOfRows);
        $chunkSize = 1000;

        foreach (array_chunk($range, $chunkSize) as $chunk) {
            $userData = null;
            gc_collect_cycles();
            unset($userData);
            $userData = [];
            foreach ($chunk as $i) {
                $userData[] = array(
                    'name' => $faker->firstName(),
                    'surname' => $faker->lastName(),
                    'phone' => '99477' . rand(1000000, 9999999),
                    'address' => $faker->sentence(2),
                    'email' => $faker->email(),
                    'notes' => $faker->sentence(2)
                );
            }

            DB::connection()->unsetEventDispatcher();
            DB::disableQueryLog();
            DB::beginTransaction();
            PhoneInfo::insert($userData);
            DB::commit();
        }
    }
}
