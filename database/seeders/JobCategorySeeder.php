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
            'Deep House Cleaning',
            'Move-in / Move-out Cleaning',
            'Kitchen Cleaning',
            'Bathroom Sanitizing',
            'Window & Glass Cleaning',
            'Upholstery Cleaning',
            'Carpet & Rug Cleaning',
            'Laundry & Linen Services',
            'Bedroom Organization',
            'Vacation Rental Turnover Cleaning',
            'Airbnb Cleaning Service',
            'Seasonal Property Cleaning',
            'Pool / Resort Cleaning',
            'Office Space Cleaning',
            'Post-Construction Cleaning',
            'Event Cleanup',
            'Retail Space Cleaning',
            'Disinfection / Sanitizing Service',
            'Park & Playground Cleanup',
            'Beach Cleanup',
            'Graffiti Removal',
            'Public Restroom Sanitation',
            'Community Garden Maintenance',
            'Pet Area Cleaning',
            'Appliance Cleaning',
            'Garage Cleaning & Organization',
            'Attic / Basement Cleaning',
            'Road Cleanup',
            'Other Public Infrastructure Cleanup',
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
