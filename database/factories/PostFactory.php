<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
Use Illuminate\Support\Str;



class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [

            'escalonado' =>$this->faker->word(10),
            'condicionfiscal' =>$this->faker->word(10),
            'rubro' => $this->faker->word(10),
            'direccion' => $name,
            'localidad' => $this->faker->word(10),
            'provincia' => $this->faker->word(10),
            'codigo_postal' => $this->faker->word(10),
            'fecha_estimada_de_firma' => $this->faker->date(),

            
            

            'user_id' => User::all()->random()->id,
            'team_id' => Team::all()->random()->id,
            'category_id'=> Category::all()->random()->id,
            
        ];
    }
}


