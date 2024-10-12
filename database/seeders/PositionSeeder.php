<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of positions
        $positions = [
            'CEO',
            'Senior Developer',
            'Junior Developer',
            'HR Manager',
            'Sales Executive',
            'Marketing Specialist',
            'Product Manager',
            'System Analyst',
        ];

        // Insert positions into the database
        foreach ($positions as $position) {
            DB::table('positions')->insert([
                'name' => $position,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
