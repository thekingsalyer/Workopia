<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use App\Models\User;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Load Job Listings from file
        $jobListings = include database_path('seeders/data/job_listings.php');

        //Get the test User Id
        $testUserId = User::where('email', 'test@test.com')->value('id');


        //Get all other User ids from the user model
         $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

         foreach($jobListings as $index => &$listing){
           if ($index < 2) {
                // Assign the first two listings to the test user
                $listing['user_id'] = $testUserId;
            } else {
                // Assign user id to listing
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }

            //Add Timestamps
            $Listing['created_at'] = now();
            $Listings['update_at'] = now();


         }

         //Insert Job Listings
         DB::table('job_listings')->insert($jobListings);
         echo "Jobs Created Successfully";
    }
}
