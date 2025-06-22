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
            'job_category_id' => 9,
            'description' => 'General house cleaning including dusting, mopping, and sanitizing bathrooms and kitchens.',
            'qualifications' => 'Previous cleaning experience preferred, but not required. Must be detail-oriented and reliable.',
            'city' => 'Valencia',
            'full_address' => '123 Main St, Valencia, Negros Oriental, PH',
            'schedule' => 'Monday to Friday, 8am - 5pm',
            'payment' => '₱500 per day',
            'job_recruiter_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);

        Job::create([
            'title' => 'AMSU Post-Construction Cleaning',
            'job_category_id' => 22,
            'description' => 'Cleaning of newly constructed buildings of AMSU, including removing debris and thorough dusting.',
            'qualifications' => 'Must have experience with post-construction cleanups and knowledge of safety protocols.',
            'city' => 'Dumaguete City',
            'full_address' => '456 New Road, Dumaguete City, Negros Oriental, PH',
            'schedule' => 'Saturday and Sunday, 9am - 6pm',
            'payment' => '₱800 per day',
            'job_recruiter_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 0,
            'application_status' => 1,
            'rate_status' => 0,
        ]);

        Job::create([
            'title' => 'Vacation House Cleaning',
            'job_category_id' => 28,
            'description' => 'Deep cleaning of vacation homes to ensure a fresh and welcoming environment for guests.',
            'qualifications' => 'Experience with hospitality cleaning and attention to detail required.',
            'city' => 'Bacong',
            'full_address' => '789 Seaside Blvd, Bacong, Negros Oriental, PH',
            'schedule' => 'Flexible schedule, weekdays and weekends',
            'payment' => '₱700 per session',
            'job_recruiter_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);

        Job::create([
            'title' => 'One-Time Home Deep Cleaning',
            'job_category_id' => 9,
            'description' => 'We are looking for a home cleaner to perform a thorough deep cleaning of a 2-bedroom apartment, including kitchen, bathroom, windows, and floors.',
            'qualifications' => "- At least 1 year of house cleaning experience\n- Can bring own cleaning supplies\n- Physically fit and punctual\n- Trustworthy and respectful of client's home",
            'city' => 'Dumaguete',
            'full_address' => '123 Rizal Blvd, Dumaguete City',
            'schedule' => '2025-06-20 09:00AM',
            'payment' => '₱1000',
            'job_recruiter_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);
            
        Job::create([
            'title' => 'Garden Waste and Yard Cleanup',
            'job_category_id' => 8,
            'description' => 'Help clean up a neighborhood garden area by collecting leaves, trimming bushes, and disposing of garden waste.',
            'qualifications' => "- Physically capable of lifting up to 20kg\n- Comfortable working under the sun\n- Can operate basic gardening tools\n- Must bring gloves and wear appropriate footwear",
            'city' => 'Valencia',
            'full_address' => 'Purok 6, Valencia',
            'schedule' => '2025-06-21 07:30AM',
            'payment' => '₱800',
            'job_recruiter_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);
            
        Job::create([
            'title' => 'Part-Time Office Janitor',
            'job_category_id' => 17,
            'description' => 'Clean workstations, restrooms, hallways, and trash bins in a small office environment for 3 hours daily.',
            'qualifications' => "- Has janitorial or maintenance experience\n- Knowledge of using disinfectants and mop/broom\n- Trustworthy and able to work after office hours\n- Must follow cleanliness protocols strictly",
            'city' => 'Bacong',
            'full_address' => 'XYZ Building, Bacong Highway',
            'schedule' => 'Weekdays 5:00PM - 8:00PM',
            'payment' => '₱500/day',
            'job_recruiter_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 0,
            'application_status' => 1,
            'rate_status' => 0,
        ]);
            
        Job::create([
            'title' => 'Vacation Home Pre-Guest Cleaning',
            'job_category_id' => 26,
            'description' => 'Prepare a 3-bedroom beachfront vacation home for guest arrival by cleaning all rooms, changing beddings, and sanitizing bathrooms and kitchen.',
            'qualifications' => "- Experience in hospitality or hotel housekeeping\n- Must be detail-oriented and neat\n- Able to follow checklist instructions\n- Reliable transportation to remote locations",
            'city' => 'Sibulan',
            'full_address' => 'Beach Road, Sibulan',
            'schedule' => '2025-06-22 10:00AM',
            'payment' => '₱950',
            'job_recruiter_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);

        Job::create([
            'title' => 'Yard Debris and Outdoor Sweeping',
            'job_category_id' => 27,
            'description' => 'Clean a residential front and backyard by sweeping leaves, gathering branches, and disposing of debris into designated bins.',
            'qualifications' => "- Has own broom and rake\n- Can work in outdoor settings for 2-3 hours\n- No allergy to dust and pollen\n- Can follow simple cleanup instructions independently",
            'city' => 'Dumaguete',
            'full_address' => 'Sunrise Village, Lot 8',
            'schedule' => '2025-06-23 08:00AM',
            'payment' => '₱700',
            'job_recruiter_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 0,
            'application_status' => 1,
            'rate_status' => 0,
        ]);
            
        Job::create([
            'title' => 'Event Hall Post-Party Cleanup',
            'job_category_id' => 11,
            'description' => 'Help clean up an event hall after a birthday party. Duties include stacking chairs, throwing away trash, mopping, and wiping tables.',
            'qualifications' => "- Available late at night\n- Physically fit to carry tables and chairs\n- Able to work quickly and efficiently in a team\n- Must wear closed shoes for safety",
            'city' => 'Dumaguete',
            'full_address' => 'Perdices Function Hall',
            'schedule' => '2025-06-23 10:00PM',
            'payment' => '₱1200',
            'job_recruiter_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 1,
            'rate_status' => 0,
        ]);
           
            
        Job::create([
            'title' => 'Warehouse Cleaning Staff (Night Shift)',
            'job_category_id' => 30,
            'description' => 'Clean storage areas in a warehouse including sweeping, organizing, and disinfecting touch surfaces.',
            'qualifications' => "- Comfortable working night shift\n- Must wear safety boots and gloves\n- Follows safety protocols\n- Prior industrial cleaning experience is a plus",
            'city' => 'Dumaguete',
            'full_address' => 'Logistics Warehouse, National Highway',
            'schedule' => 'Weekdays 6:00PM',
            'payment' => '₱750/day',
            'job_recruiter_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            'approved_status' => 1,
            'application_status' => 0,
            'rate_status' => 0,
        ]);

    }
}
