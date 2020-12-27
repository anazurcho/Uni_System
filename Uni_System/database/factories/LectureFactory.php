<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

class LectureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this ->faker->name,
            'course_id' => self::factoryForModel(Course::class)
        ];
    }
}
