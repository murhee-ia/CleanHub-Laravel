<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'title' => 'House Cleaning Service',
            'job_category_id' => 1,
            'description' => 'General house cleaning including dusting, mopping, and sanitizing bathrooms and kitchens.',
            'qualifications' => 'Previous cleaning experience preferred, but not required. Must be detail-oriented and reliable.',
            'city' => 'Valencia',
            'full_address' => '123 Main St, Valencia, Negros Oriental, PH',
            'schedule' => 'Monday to Friday, 8am - 5pm',
            'payment' => '₱500 per day',
            'media_paths' => json_encode(['media1.jpg', 'media2.jpg']),
            'approved_status' => true,
            'recruiter_id' => 1,
        ]);

        Job::create([
            'title' => 'AMSU Post-Construction Cleaning',
            'job_category_id' => 15,
            'description' => 'Cleaning of newly constructed buildings of AMSU, including removing debris and thorough dusting.',
            'qualifications' => 'Must have experience with post-construction cleanups and knowledge of safety protocols.',
            'city' => 'Dumaguete City',
            'full_address' => '456 New Road, Dumaguete City, Negros Oriental, PH',
            'schedule' => 'Saturday and Sunday, 9am - 6pm',
            'payment' => '₱800 per day',
            'media_paths' => json_encode(['media3.jpg']),
            'approved_status' => true,
            'recruiter_id' => 1,
        ]);

        Job::create([
            'title' => 'Vacation House Cleaning',
            'job_category_id' => 12,
            'description' => 'Deep cleaning of vacation homes to ensure a fresh and welcoming environment for guests.',
            'qualifications' => 'Experience with hospitality cleaning and attention to detail required.',
            'city' => 'Bacong',
            'full_address' => '789 Seaside Blvd, Bacong, Negros Oriental, PH',
            'schedule' => 'Flexible schedule, weekdays and weekends',
            'payment' => '₱700 per session',
            'media_paths' => json_encode(['media4.jpg', 'media5.jpg']),
            'approved_status' => true,
            'recruiter_id' => 2,
        ]);
    }
}
