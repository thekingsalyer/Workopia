<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Disable foreign key constraints
    Schema::disableForeignKeyConstraints();
        //Truncate tables
        DB::table('job_listings')->truncate();
        DB::table('users')->truncate();
        DB::table('job_user_bookmarks')->truncate();
        DB::table('applicants')->truncate();


       Schema::enableForeignKeyConstraints();
        $this->call(TestUserSeeder::class);
        $this->call(RandomUserseeder::class);
        $this->call(JobSeeder::class);
        $this->call(BookmarkSeeder::class);

    }
}
