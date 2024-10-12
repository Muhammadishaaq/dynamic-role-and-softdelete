<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of departments
        $departments = [
            'HR',
            'Sales',
            'Marketing',
            'IT',
            'Finance',
            'Administration',
            'Research and Development',
        ];

        // Insert departments into the database
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
