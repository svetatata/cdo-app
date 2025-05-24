<?php 
$pageTitle = 'О нас';
$metaDescription = 'Центр дистанционного обучения Idea Teach - ваш надежный партнер в получении качественного образования. Более 10 лет опыта, ведущие вузы России, индивидуальный подход.';
$metaKeywords = 'о компании, центр дистанционного обучения, история компании, команда, преимущества, опыт работы, партнеры, миссия';
?>

@include('layout.header')

<main>
    <!-- Хедер страницы -->
    <section class="bg-purple-800 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">О центре Idea Teach</h1>
            <p class="text-xl">Ваш надежный партнер в получении качественного образования</p>
        </div>
    </section>

    <!-- Основная информация -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Наша миссия</h2>
                    <p class="text-gray-600 mb-6">Мы стремимся сделать качественное образование доступным для каждого, независимо от места проживания и уровня занятости. Наша цель - помочь вам реализовать свой потенциал через современные образовательные технологии.</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-purple-600 mt-1 mr-3"></i>
                            <p>Более 10 лет опыта в дистанционном образовании</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-purple-600 mt-1 mr-3"></i>
                            <p>Сотрудничество с ведущими вузами России</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-purple-600 mt-1 mr-3"></i>
                            <p>Более 5000 успешных выпускников</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/banners/bachelor.webp') }}" alt="О нас" class="rounded-lg shadow-xl">
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-lg shadow-lg">
                        <div class="text-4xl font-bold text-purple-600 mb-2">10+</div>
                        <div class="text-gray-600">лет на рынке образования</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Наша команда -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Наша команда</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Член команды 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/peoples/man.jpg') }}" alt="Член команды" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Иванов Иван</h3>
                        <p class="text-purple-600 mb-4">Руководитель центра</p>
                        <p class="text-gray-600">Более 15 лет опыта в сфере образования</p>
                    </div>
                </div>
                <!-- Член команды 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/peoples/wom.webp') }}" alt="Член команды" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Петрова Анна</h3>
                        <p class="text-purple-600 mb-4">Менеджер по работе с абитуриентами</p>
                        <p class="text-gray-600">Помогает выбрать оптимальную программу обучения</p>
                    </div>
                </div>
                <!-- Член команды 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/peoples/man.jpeg') }}" alt="Член команды" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Церковников Светлан</h3>
                        <p class="text-purple-600 mb-4">Технический специалист</p>
                        <p class="text-gray-600">Обеспечивает бесперебойную работу платформы</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Наши преимущества -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Почему выбирают нас</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Качество образования</h3>
                    <p class="text-gray-600">Дипломы государственного образца</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Гибкий график</h3>
                    <p class="text-gray-600">Учитесь в удобное время</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Поддержка 24/7</h3>
                    <p class="text-gray-600">Всегда на связи</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Доступные цены</h3>
                    <p class="text-gray-600">Рассрочка и скидки</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма обратной связи -->
    @include('layout.feedback')
</main>

@include('layout.footer') 