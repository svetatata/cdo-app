<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Program;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'course' => 1,
                'name' => 'Введение в программирование',
                'slug' => 'intro-programming',
                'description' => 'Основы программирования и алгоритмизации',
                'theory_hours' => 36,
                'practice_hours' => 36,
            ],
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'course' => 1,
                'name' => 'Базы данных',
                'slug' => 'databases',
                'description' => 'Основы проектирования и работы с базами данных',
                'theory_hours' => 36,
                'practice_hours' => 36,
            ],
            [
                'program_id' => Program::where('slug', 'economics-master')->first()->id,
                'course' => 1,
                'name' => 'Эконометрика',
                'slug' => 'econometrics',
                'description' => 'Применение статистических методов в экономике',
                'theory_hours' => 48,
                'practice_hours' => 24,
            ],
            [
                'program_id' => Program::where('slug', 'nursing')->first()->id,
                'course' => 1,
                'name' => 'Анатомия и физиология',
                'slug' => 'anatomy',
                'description' => 'Основы анатомии и физиологии человека',
                'theory_hours' => 72,
                'practice_hours' => 36,
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
