<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institution;
use Illuminate\Support\Str;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutions = [
            [
                'name' => 'Московский Государственный Университет',
                'slug' => 'msu',
                'type' => 'university',
                'description' => 'Один из старейших и крупнейших университетов России',
                'email' => 'info@msu.ru',
                'phone' => '+7 (495) 939-1000',
                'person' => 'Иванов Иван Иванович',
                'is_active' => true,
            ],
            [
                'name' => 'Санкт-Петербургский Государственный Университет',
                'slug' => 'spbu',
                'type' => 'university',
                'description' => 'Один из ведущих университетов России',
                'email' => 'info@spbu.ru',
                'phone' => '+7 (812) 328-2000',
                'person' => 'Петров Петр Петрович',
                'is_active' => true,
            ],
            [
                'name' => 'Московский Технический Колледж',
                'slug' => 'mtc',
                'type' => 'college',
                'description' => 'Современный технический колледж с широким спектром специальностей',
                'email' => 'info@mtc.ru',
                'phone' => '+7 (495) 123-4567',
                'person' => 'Сидоров Сидор Сидорович',
                'is_active' => true,
            ],
            [
                'name' => 'Ярославский государственный колледж',
                'type' => 'college',
                'description' => 'Один из ведущих колледжей Ярославской области, предлагающий качественное среднее профессиональное образование.',
                'email' => 'info@ygk.edu.ru',
                'phone' => '+7 (4852) 30-00-00',
                'person' => 'Иванов Иван Иванович',
                'is_active' => true
            ],
            [
                'name' => 'Ярославский промышленно-экономический колледж',
                'type' => 'college',
                'description' => 'Крупнейший колледж Ярославля, специализирующийся на подготовке специалистов для промышленности и экономики.',
                'email' => 'info@ypek.edu.ru',
                'phone' => '+7 (4852) 40-00-00',
                'person' => 'Петров Петр Петрович',
                'is_active' => true
            ],
            [
                'name' => 'Ярославский государственный технический университет',
                'type' => 'university',
                'description' => 'Ведущий технический вуз Ярославской области, предлагающий широкий спектр инженерных специальностей.',
                'email' => 'info@ystu.edu.ru',
                'phone' => '+7 (4852) 50-00-00',
                'person' => 'Сидоров Сидор Сидорович',
                'is_active' => true
            ],
            [
                'name' => 'Ярославский государственный педагогический университет',
                'type' => 'university',
                'description' => 'Крупнейший педагогический вуз региона, готовящий специалистов в области образования и педагогики.',
                'email' => 'info@yspu.edu.ru',
                'phone' => '+7 (4852) 60-00-00',
                'person' => 'Смирнова Анна Ивановна',
                'is_active' => true
            ],
            [
                'name' => 'Ярославский государственный университет',
                'type' => 'university',
                'description' => 'Классический университет, предлагающий широкий спектр гуманитарных и естественнонаучных специальностей.',
                'email' => 'info@ysu.edu.ru',
                'phone' => '+7 (4852) 70-00-00',
                'person' => 'Козлова Мария Петровна',
                'is_active' => true
            ]
        ];

        foreach ($institutions as $institution) {
            Institution::create([
                'name' => $institution['name'],
                'slug' => Str::slug($institution['name']),
                'type' => $institution['type'],
                'description' => $institution['description'],
                'email' => $institution['email'],
                'phone' => $institution['phone'],
                'person' => $institution['person'],
                'is_active' => $institution['is_active']
            ]);
        }
    }
}
