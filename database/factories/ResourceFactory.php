<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'set_id' => Set::factory(),
            'path' => $this->faker->filePath()
        ];
    }
}
