<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Delete all existing products first
        Product::truncate();

        Product::create([
            'name' => 'BYKEA App Redesign',
            'slug' => 'bykea-app-redesign',
            'description' => 'Enhancing UX and visual appeal of Bykea app.',
            'price' => 20000,
            'image' => 'images/img1.avif',
        ]);

        Product::create([
            'name' => 'Employee Dashboard Design',
            'slug' => 'employee-dashboard-design',
            'description' => 'Streamlined HR and analytics dashboard.',
            'price' => 15000,
            'image' => 'images/img44.png',
        ]);
    }
}
