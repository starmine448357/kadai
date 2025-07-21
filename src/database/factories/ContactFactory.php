<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        $categoryId = Category::inRandomOrder()->first()->id ?? 1;

        return [
            'category_ids' => $categoryId,
            'first_names' => $this->faker->firstName, 
            'last_names' => $this->faker->lastName,   
            'genders' => $this->faker->randomElement([1, 2, 3]), 
            'emails' => $this->faker->unique()->safeEmail,     
            'tels' => $this->faker->numerify('#####'),         
            'addresses' => $this->faker->address,             
            'buildings' => $this->faker->secondaryAddress,     
            'details' => $this->faker->realText(rand(50, 120)), 
        ];
    }
}