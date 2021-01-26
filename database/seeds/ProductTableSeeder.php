<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'MacBook Pro 1',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 12000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'Lenovo',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 11000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'Acer',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 15000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'Asus Pro',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 13000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'MacBook Pro 5',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 18000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'Dell Latitude',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 20000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);

        Product::create([
            'name' => 'MacBook Pro 7',
            'details' => '15 inch, 178 SDD, 32GB RAM',
            'price' => 18000,
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi necessitatibus, facilis exercitationem aperiam deserunt ducimus facere illo aut rem."
        ]);
    }
}
