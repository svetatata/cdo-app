<?php $pageTitle = 'Результаты поиска'?>

@include('layout.header')
<main>
<!-- Заголовок страницы -->
<section class="bg-purple-800 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Результаты поиска</h1>
        <p class="text-xl text-purple-100">
            Поиск по запросу: <span class="font-bold">"{{ request('query') }}"</span>
            <br>
            Найдено результатов: <span class="font-bold">12</span>
        </p>
    </div>
</section>

<!-- Основной контент -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <!-- Фильтры -->
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <form class="grid grid-cols-1 md:grid-cols-4 gap-4" method="GET" action="/search">
                    <input type="hidden" name="query" value="{{ request('query') }}">
                    <div>
                        <label class="block text-gray-700 mb-2">Тип</label>
                        <select class="form-select">
                            <option value="">Все типы</option>
                            <option value="program">Программы</option>
                            <option value="news">Новости</option>
                            <option value="article">Статьи</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Направление</label>
                        <select class="form-select">
                            <option value="">Все направления</option>
                            <option value="it">IT</option>
                            <option value="business">Бизнес</option>
                            <option value="education">Образование</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Сортировка</label>
                        <select class="form-select">
                            <option value="relevance">По релевантности</option>
                            <option value="date">По дате</option>
                            <option value="popularity">По популярности</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="btn btn-primary w-full">Применить</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Результаты поиска -->
        <div class="space-y-6">
            <!-- Программа -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-start">
                    <img src="{{ asset('images/programs/program1.jpg') }}" alt="Программа" class="w-32 h-32 object-cover rounded-lg mr-6">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Программа</span>
                            <span class="text-gray-500 text-sm ml-4">Бакалавриат</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Информационные технологии</h3>
                        <p class="text-gray-600 mb-4">Программа подготовки специалистов в области информационных технологий с углубленным изучением программирования и системного администрирования.</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-4"><i class="far fa-clock mr-1"></i> 4 года</span>
                            <span class="mr-4"><i class="fas fa-graduation-cap mr-1"></i> Очная/Заочная</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Москва</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Новость -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-start">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Новость" class="w-32 h-32 object-cover rounded-lg mr-6">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">Новость</span>
                            <span class="text-gray-500 text-sm ml-4">15 марта 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Открыт набор на новые программы обучения</h3>
                        <p class="text-gray-600 mb-4">Мы рады сообщить о запуске новых образовательных программ в области IT и бизнес-аналитики. Успейте подать заявку на обучение!</p>
                        <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Читать далее →</a>
                    </div>
                </div>
            </div>

            <!-- Статья -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-start">
                    <img src="{{ asset('images/articles/article1.jpg') }}" alt="Статья" class="w-32 h-32 object-cover rounded-lg mr-6">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Статья</span>
                            <span class="text-gray-500 text-sm ml-4">10 марта 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Как выбрать направление обучения в IT</h3>
                        <p class="text-gray-600 mb-4">Подробный гид по выбору направления в IT-сфере: от программирования до DevOps. Разбираемся в перспективах и требованиях к специалистам.</p>
                        <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Читать далее →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Пагинация -->
        <div class="mt-12">
            <div class="flex justify-center space-x-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 bg-purple-600 text-white rounded-lg">1</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
</main>

@include('layout.footer') 