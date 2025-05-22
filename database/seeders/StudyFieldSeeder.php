<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyField;

class StudyFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Информационные технологии',
                'slug' => 'it',
                'description' => 'Программирование, разработка программного обеспечения, системное администрирование',
            ],
            [
                'name' => 'Экономика и финансы',
                'slug' => 'economics',
                'description' => 'Бухгалтерский учет, финансовый менеджмент, банковское дело',
            ],
            [
                'name' => 'Медицина',
                'slug' => 'medicine',
                'description' => 'Лечебное дело, сестринское дело, фармация',
            ],
            [
                'name' => 'Право',
                'slug' => 'law',
                'description' => 'Гражданское право, уголовное право, международное право',
            ],
            [
                'name' => 'Психология',
                'slug' => 'psychology',
                'description' => 'Общая психология, клиническая психология, педагогическая психология',
            ],
        ];

        foreach ($fields as $field) {
            StudyField::create($field);
        }
    }
}
