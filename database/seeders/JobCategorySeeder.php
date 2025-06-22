<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Airbnb Cleaning Service',
            'Appliance Cleaning',
            'Attic / Basement Cleaning',
            'Bathroom Sanitizing',
            'Beach Cleanup',
            'Bedroom Organization',
            'Carpet & Rug Cleaning',
            'Community Garden Maintenance',
            'Deep House Cleaning',
            'Disinfection / Sanitizing Service',
            'Event Cleanup',
            'Garage Cleaning & Organization',
            'Graffiti Removal',
            'Kitchen Cleaning',
            'Laundry & Linen Services',
            'Move-in / Move-out Cleaning',
            'Office Space Cleaning',
            'Other Public Infrastructure Cleanup',
            'Park & Playground Cleanup',
            'Pet Area Cleaning',
            'Pool / Resort Cleaning',
            'Post-Construction Cleaning',
            'Public Restroom Sanitation',
            'Retail Space Cleaning',
            'Road Cleanup',
            'Seasonal Property Cleaning',
            'Subdivision Cleaning',
            'Vacation Rental Turnover Cleaning',
            'Upholstery Cleaning',
            'Warehouse Cleaning',
            'Window & Glass Cleaning',
        ];

        foreach ($categories as $category) {
            JobCategory::create([
                'title' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
