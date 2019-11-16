<?php



$factory->define(App\Menu::class, function () {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    
    return [
        //
        'name' => $faker->unique()->foodName(),
        'harga' => $faker->numberBetween($min = 1000, $max = 9000),
        'foto' => $faker->imageUrl($width = 640, $height = 480, 'food')
    ];
});
