<?php

namespace Bpocallaghan\LogActivity\Database\Factories;

use Bpocallaghan\LogActivity\Models\LogActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => 'Example Activity',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ];
    }
}
