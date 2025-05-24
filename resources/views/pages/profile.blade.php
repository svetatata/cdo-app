<?php 
$pageTitle = 'Личный кабинет';
$metaDescription = 'Личный кабинет пользователя Idea Teach. Управление заявками, курсами и настройками профиля.';
$metaKeywords = 'личный кабинет, профиль пользователя, управление заявками, мои курсы, настройки профиля, дистанционное обучение';
?>

@include('layout.header')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Заголовок -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Личный кабинет</h1>
            <p class="text-gray-600 mt-2">Управление вашим профилем и настройками</p>
        </div>

        <!-- Основная информация -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center space-x-6">
                <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-4xl text-purple-700"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Навигация по разделам -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <a href="#applications" class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Мои заявки</h3>
                <p class="text-gray-600">Просмотр и управление заявками на обучение</p>
            </a>
            <a href="#courses" class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Мои курсы</h3>
                <p class="text-gray-600">Доступ к вашим учебным материалам</p>
            </a>
            <a href="#settings" class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Настройки</h3>
                <p class="text-gray-600">Управление настройками профиля</p>
            </a>
        </div>

        <!-- Секция заявок -->
        <div id="applications" class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Мои заявки</h2>
            <div class="space-y-4">
                <!-- Здесь будет список заявок -->
                <p class="text-gray-600">У вас пока нет активных заявок</p>
            </div>
        </div>

        <!-- Секция курсов -->
        <div id="courses" class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Мои курсы</h2>
            <div class="space-y-4">
                <!-- Здесь будет список курсов -->
                <p class="text-gray-600">У вас пока нет активных курсов</p>
            </div>
        </div>

        <!-- Секция настроек -->
        <div id="settings" class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Настройки профиля</h2>
            <form class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2" for="name">Имя</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-input">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2" for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-input">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2" for="phone">Телефон</label>
                    <input type="tel" id="phone" name="phone" class="form-input">
                </div>
                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
            </form>
        </div>
    </div>
</div>
@include('layout.feedback')


@include('layout.footer') 