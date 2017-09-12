<?php
use App\Manufacturer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
class ManufacturerSeeder extends Seeder
{
    protected $manufacturer;
    protected $faker;
    public function __construct(Manufacturer $manufacturer, Faker $faker) {
        $this->manufacturer = $manufacturer;
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
      foreach (range(1, 10) as $x) {
        $this->manufacturer->create([
        'title' => $faker->name(),
        'website_url' => $faker->url(),
        'country' => $faker->countryCode()
       ]);
      }
    }
}