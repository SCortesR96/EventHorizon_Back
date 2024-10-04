<?php

namespace Database\Factories;

use App\Models\DocumentType;
use App\Models\Gender;
use App\Modules\User\Data\Entities\UserStoreEntity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isDeleted = $this->faker->boolean();

        return [
            'avatar'           => $this->faker->imageUrl(640, 480, 'people'),
            'username'         => $this->faker->unique()->userName(),
            'first_name'       => $this->faker->firstName(),
            'second_name'      => $this->faker->firstName(),
            'first_lastname'   => $this->faker->lastName(),
            'second_lastname'  => $this->faker->lastName(),
            'document_type_id' => DocumentType::inRandomOrder()->first()->id,
            'document'         => $this->faker->unique()->numerify('##########'),
            'gender_id'        => Gender::inRandomOrder()->first()->id,
            'phone_country'    => $this->faker->countryCode(),
            'phone'            => $this->faker->phoneNumber(),
            'birthdate'        => $this->faker->date('Y-m-d', '2000-01-01'),
            'email'            => $this->faker->unique()->safeEmail(),
            'enabled'          => $this->faker->boolean(),
            'password'         => Hash::make('password'),
            'deleted_at'       => $isDeleted ? now() : null
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
