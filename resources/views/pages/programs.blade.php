<?php $pageTitle = 'Программы обучения'?>

@include('layout.header')

<main>
    <!-- Хедер страницы -->
    <section class="bg-purple-800 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Программы обучения</h1>
            <p class="text-xl">Выберите подходящую программу для вашего образования</p>
        </div>
    </section>

<!-- Фильтры -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <form action="{{ route('programs.index') }}" method="GET" class="space-y-6">
            <!-- Поисковая строка -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" 
                        name="query" 
                        id="programSearch"
                        value="{{ request('query') }}"
                        placeholder="Поиск по названию, описанию или учебному заведению..." 
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-base">
            </div>

            <!-- Фильтры -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Степень -->
                <div>
                    <label for="degree" class="block text-sm font-medium text-gray-700 mb-1">Уровень образования</label>
                    <select name="degree" id="degree" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent rounded-lg shadow-sm">
                        <option value="">Все уровни</option>
                        <option value="college" {{ request('degree') == 'college' ? 'selected' : '' }}>Колледж</option>
                        <option value="bachelor" {{ request('degree') == 'bachelor' ? 'selected' : '' }}>Бакалавриат</option>
                        <option value="master" {{ request('degree') == 'master' ? 'selected' : '' }}>Магистратура</option>
                        <option value="training" {{ request('degree') == 'training' ? 'selected' : '' }}>Курсы</option>
                    </select>
                </div>

                <!-- Форма обучения -->
                <div>
                    <label for="study_form" class="block text-sm font-medium text-gray-700 mb-1">Форма обучения</label>
                    <select name="study_form" id="study_form" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent rounded-lg shadow-sm">
                        <option value="">Все формы</option>
                        <option value="full-time" {{ request('study_form') == 'full-time' ? 'selected' : '' }}>Очная</option>
                        <option value="part-time" {{ request('study_form') == 'part-time' ? 'selected' : '' }}>Заочная</option>
                        <option value="distance" {{ request('study_form') == 'distance' ? 'selected' : '' }}>Дистанционная</option>
                    </select>
                </div>

                <!-- Направление -->
                <div>
                    <label for="study_field" class="block text-sm font-medium text-gray-700 mb-1">Направление</label>
                    <select name="study_field" id="study_field" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent rounded-lg shadow-sm">
                        <option value="">Все направления</option>
                        @foreach($studyFields as $field)
                            <option value="{{ $field->id }}" {{ request('study_field') == $field->id ? 'selected' : '' }}>
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Стоимость -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Стоимость</label>
                    <select name="price" id="price" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent rounded-lg shadow-sm">
                        <option value="">Любая стоимость</option>
                        <option value="0-50000" {{ request('price') == '0-50000' ? 'selected' : '' }}>До 50 000 ₽</option>
                        <option value="50000-100000" {{ request('price') == '50000-100000' ? 'selected' : '' }}>50-100 тыс. ₽</option>
                        <option value="100000-200000" {{ request('price') == '100000-200000' ? 'selected' : '' }}>100-200 тыс. ₽</option>
                        <option value="200000+" {{ request('price') == '200000+' ? 'selected' : '' }}>Более 200 тыс. ₽</option>
                    </select>
                </div>
            </div>

            <!-- Кнопки -->
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                <button type="submit" class="w-full sm:w-auto px-6 py-2 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                    Применить фильтры
                </button>
                
                @if(request()->hasAny(['query', 'degree', 'study_form', 'study_field', 'price']))
                    <a href="{{ route('programs.index') }}" class="w-full sm:w-auto flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Сбросить фильтры
                    </a>
                @endif
            </div>
        </form>
    </div>
</section>

<!-- Программы -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="results-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($programs as $program)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative h-48">
                    @if($program->image)
                        <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-4xl text-gray-400"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm">
                        {{ $program->studyField->name }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $program->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($program->description, 100) }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i>{{ $program->duration_months }} мес.</span>
                            <span><i class="fas fa-graduation-cap mr-1"></i>
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
                        </div>
                        <div class="text-lg font-bold text-purple-600">
                            {{ number_format($program->price, 0, ',', ' ') }} ₽
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">{{ $program->institution->name }}</span>
                        <a href="{{ route('programs.show', $program->slug) }}" class="btn btn-outline-primary">
                            Подробнее
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-600">По вашему запросу ничего не найдено</p>
            </div>
            @endforelse
        </div>

        <!-- Пагинация -->
        @if($programs->hasPages())
            <div class="mt-8">
            {{ $programs->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Преимущества -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Почему выбирают наши программы</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="benefit-icon mb-4">
                    <i class="fas fa-graduation-cap text-4xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Качественное образование</h3>
                <p class="text-gray-600">Программы соответствуют современным стандартам образования</p>
            </div>
            <div class="text-center">
                <div class="benefit-icon mb-4">
                    <i class="fas fa-laptop text-4xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Дистанционное обучение</h3>
                <p class="text-gray-600">Учитесь из любой точки мира в удобное время</p>
            </div>
            <div class="text-center">
                <div class="benefit-icon mb-4">
                    <i class="fas fa-certificate text-4xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Государственный диплом</h3>
                <p class="text-gray-600">Получите диплом государственного образца</p>
            </div>
        </div>
    </div>
</section>

    <!-- Форма обратной связи -->
    @include('layout.feedback')
</main>

<script>
document.getElementById('programSearch').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const query = this.value.trim();
        if (query) {
            window.location.href = "{{ route('programs.index') }}?query=" + encodeURIComponent(query);
        }
    }
});
</script>

@include('layout.footer') 
