<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'user_id' => '1',
            'course_id' => 'sample_course_id', // Change this to an actual course ID or a random value for the sample.
            'status' => 'active', // Change this as needed, e.g., active, pending, expired, etc.
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
