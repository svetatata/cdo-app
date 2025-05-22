<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Program;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'name' => 'ИТ-2024-1',
                'start_date' => '2024-09-01',
                'end_date' => '2028-06-30',
                'max_students' => 25,
                'is_active' => true,
            ],
            [
                'program_id' => Program::where('slug', 'economics-master')->first()->id,
                'name' => 'ЭК-2024-1',
                'start_date' => '2024-09-01',
                'end_date' => '2026-06-30',
                'max_students' => 20,
                'is_active' => true,
            ],
            [
                'program_id' => Program::where('slug', 'nursing')->first()->id,
                'name' => 'СД-2024-1',
                'start_date' => '2024-09-01',
                'end_date' => '2027-06-30',
                'max_students' => 30,
                'is_active' => true,
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
