<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'OFFICE 1',
                'slug' => 'office-1'
            ],
            [
                'name' => 'OFFICE 2',
                'slug' => 'office-2'
            ],
            [
                'name' => 'OFFICE 3',
                'slug' => 'office-3'
            ],
        ];

        foreach ($classes as $StudentClass) {

            // dd($StudentClass);
            $class = new StudentClass();

            $class->name = $StudentClass['name'];
            $class->slug = $StudentClass['slug'];

            $class->save();
        }
    }
}
