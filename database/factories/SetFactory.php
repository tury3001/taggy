<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Set;
use Carbon\Carbon;

class SetFactory extends Factory
{
    protected $model = Set::class;

    public function definition()
    {
        return [
          'name' => $this->faker->word(),
          'created_at' => Carbon::now()
        ];
    }
}
