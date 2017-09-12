<?php
use App\Product;
use App\Category;
use App\Manufacturer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
	protected $product;
	protected $faker;
	protected $category;
	protected $manufacturer;

	public function __construct(Product $product, Category $category, Manufacturer $manufacturer, Faker $faker){
		$this->product = $product;
		$this->faker = $faker;
		$this->category = $category;
		$this->manufacturer = $manufacturer;
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->faker->create();

        $category_ids = $this->category->pluck('id');
        $manufacturer_ids = $this->manufacturer->pluck('id');

			foreach (range(1, 30) as $x) {
			# code...
				$this->product->create([
					'title' => $faker->name(),
			    	'description' => $faker->sentence(200),
			    	'price' => $faker->numberBetween(10, 100),
			    	'quantity' => $faker->numberBetween(1, 15),
			    	'image_url' => $faker->imageUrl(300, 400, 'city'),
			    	'category_id' => $category_ids->random(),
			    	'manufacturer_id' => $manufacturer_ids->random()
    			]);
			}
    }
}
