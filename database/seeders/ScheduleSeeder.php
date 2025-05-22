<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Program;
use App\Models\User;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем тестового преподавателя
        $teacher = User::factory()->create([
            'name' => 'Преподаватель',
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
        ]);

        $schedules = [
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'teacher_id' => $teacher->id,
                'start_time' => '2024-09-01 10:00:00',
                'end_time' => '2024-09-01 13:30:00',
                'title' => 'Вводная лекция по программированию',
                'description' => 'Знакомство с курсом и основными концепциями программирования',
                'type' => 'lecture',
            ],
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'teacher_id' => $teacher->id,
                'start_time' => '2024-09-02 14:00:00',
                'end_time' => '2024-09-02 17:30:00',
                'title' => 'Практическое занятие по базам данных',
                'description' => 'Работа с SQL и проектирование баз данных',
                'type' => 'practice',
            ],
            [
                'program_id' => Program::where('slug', 'economics-master')->first()->id,
                'teacher_id' => $teacher->id,
                'start_time' => '2024-09-03 10:00:00',
                'end_time' => '2024-09-03 13:30:00',
                'title' => 'Лекция по эконометрике',
                'description' => 'Основы статистического анализа в экономике',
                'type' => 'lecture',
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
