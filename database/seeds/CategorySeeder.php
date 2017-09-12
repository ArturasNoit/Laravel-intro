<?php
use App\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
	protected $category;
    protected $faker;
    public function __construct(Category $category, Faker $faker) {
        $this->category = $category;
        $this->faker = $faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = $this->faker->create();
      foreach (range(1, 15) as $x) {
        $this->category->create([
        'title' => $faker->company()
       ]);
      }
    }
}