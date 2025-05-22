<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Program;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = User::where('email', 'teacher@example.com')->first();

        $tasks = [
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'teacher_id' => $teacher->id,
                'title' => 'Первая лабораторная работа по программированию',
                'description' => 'Разработка простого консольного приложения на Python',
                'due_date' => '2024-09-15',
                'max_score' => 10,
            ],
            [
                'program_id' => Program::where('slug', 'it-bachelor')->first()->id,
                'teacher_id' => $teacher->id,
                'title' => 'Проект по базам данных',
                'description' => 'Разработка схемы базы данных для интернет-магазина',
                'due_date' => '2024-09-30',
                'max_score' => 20,
            ],
            [
                'program_id' => Program::where('slug', 'economics-master')->first()->id,
                'teacher_id' => $teacher->id,
                'title' => 'Эконометрический анализ',
                'description' => 'Проведение регрессионного анализа экономических данных',
                'due_date' => '2024-09-20',
                'max_score' => 15,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
