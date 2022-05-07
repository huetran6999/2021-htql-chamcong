<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'p_id' => '9',
            'f_id' => '3',
            'u_name' => $this->faker->name(),
            'u_gender'=>$this->faker->randomElement([0,1]),
            'u_IDcode'=>$this->faker->phoneNumber(),
            'u_IDcodedate'=> $this->faker->date($format = 'Y_m_d', $max = 'now', $min='2015-01-01'),
            'u_IDcodeplace'=>$this->faker->city(),
            'u_dob'=>$this->faker->date($format = 'Y_m_d', $max = '2000-12-31', $min='1975-01-01'),
            'u_pob'=>$this->faker->city(),
            'u_household'=>$this->faker->address(),
            'u_address'=>$this->faker->address(),
            'u_phone' => $this->faker->phoneNumber(),
            'u_email' => $this->faker->unique()->safeEmail(),
            'u_nationality'=> $this->faker->country(),
            'u_checkindate'=>$this->faker->date($format = 'Y_m_d', $max = 'now', $min='2000-01-01'),
            'u_status'=>$this->faker->randomElement([0,1]),
            'username' => $this->faker->unique()->userName(),
            'password' => bcrypt('123456'),
            
        ];
 
    }

    public function subscribed() {
        return $this
            ->afterCreating(function(User $user){
                $role = Role::where('r_name','employee')->get();
                $user->role()->sync($role->pluck('id')->toArray());
            });
    }
}