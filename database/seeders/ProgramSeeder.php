<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Institution;
use App\Models\StudyField;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'institution_id' => Institution::where('slug', 'msu')->first()->id,
                'study_field_id' => StudyField::where('slug', 'it')->first()->id,
                'title' => 'Бакалавриат по информационным технологиям',
                'slug' => 'it-bachelor',
                'degree' => 'bachelor',
                'study_form' => 'full-time',
                'duration_months' => 48,
                'price' => 350000.00,
                'description' => 'Программа подготовки бакалавров в области информационных технологий',
                'is_active' => true,
            ],
            [
                'institution_id' => Institution::where('slug', 'spbu')->first()->id,
                'study_field_id' => StudyField::where('slug', 'economics')->first()->id,
                'title' => 'Магистратура по экономике',
                'slug' => 'economics-master',
                'degree' => 'master',
                'study_form' => 'part-time',
                'duration_months' => 24,
                'price' => 280000.00,
                'description' => 'Программа подготовки магистров в области экономики',
                'is_active' => true,
            ],
            [
                'institution_id' => Institution::where('slug', 'mtc')->first()->id,
                'study_field_id' => StudyField::where('slug', 'medicine')->first()->id,
                'title' => 'Сестринское дело',
                'slug' => 'nursing',
                'degree' => 'college',
                'study_form' => 'full-time',
                'duration_months' => 36,
                'price' => 150000.00,
                'description' => 'Программа подготовки специалистов среднего звена по сестринскому делу',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
