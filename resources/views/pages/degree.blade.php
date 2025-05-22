<?php $pageTitle = $program->title ?>

@include('layout.header')

<div class="container mx-auto px-4 py-8">
    <!-- Заголовок программы -->
    <div class="max-w-4xl mx-auto mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $program->title }}</h1>
        <div class="flex items-center space-x-4 text-gray-600">
            <span><i class="fas fa-clock mr-2"></i>{{ $program->duration_months }} мес.</span>
            <span><i class="fas fa-graduation-cap mr-2"></i>
                @switch($program->degree)
                    @case('college')
                        Колледж
                        @break
                    @case('bachelor')
                        Бакалавриат
                        @break
                    @case('master')
                        Магистратура
                        @break
                    @case('training')
                        Курсы
                        @break
                @endswitch
            </span>
            <span><i class="fas fa-map-marker-alt mr-2"></i>
                @switch($program->study_form)
                    @case('full-time')
                        Очно-заочная
                        @break
                    @case('part-time')
                        Заочная
                        @break
                    @case('distance')
                        Дистанционная
                        @break
                @endswitch
            </span>
        </div>
    </div>

    <!-- Основная информация -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Левая колонка -->
        <div class="md:col-span-2 space-y-8">
            <!-- Описание -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">О программе</h2>
                <p class="text-gray-600 mb-4">{{ $program->description }}</p>
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Практические навыки</h3>
                        <p class="text-gray-600">Реальные проекты и стажировки</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Командная работа</h3>
                        <p class="text-gray-600">Развитие soft skills</p>
                    </div>
                </div>
            </div>

            <!-- Учебный план -->
            @if($program->subjects->count() > 0)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Учебный план</h2>
                <div class="space-y-4">
                    @foreach($program->subjects->groupBy('course') as $course => $subjects)
                    <div class="border-l-4 border-purple-600 pl-4">
                        <h3 class="font-bold">{{ $course }} курс</h3>
                        <p class="text-gray-600">{{ $subjects->pluck('name')->join(', ') }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Правая колонка -->
        <div class="space-y-8">
            <!-- Форма заявки -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Подать заявку</h2>
                <form action="/application/submit" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="program" value="{{ $program->title }}">
                    <input type="hidden" name="direction" value="{{ $program->studyField->name }}">
                    <div>
                        <label class="block text-gray-700 mb-2" for="name">Ваше имя</label>
                        <input type="text" id="name" name="name" class="input-field" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email" class="input-field" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="phone">Телефон</label>
                        <input type="tel" id="phone" name="phone" class="input-field" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">
                        Отправить заявку
                    </button>
                </form>
            </div>

            <!-- Контакты -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Контакты</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-phone text-purple-600 mr-3"></i>
                        <span>{{ $program->institution->phone }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-purple-600 mr-3"></i>
                        <span>{{ $program->institution->email }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-user text-purple-600 mr-3"></i>
                        <span>{{ $program->institution->person }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.feedback')
@include('layout.footer') 