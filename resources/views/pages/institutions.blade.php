<?php 
$pageTitle = 'Вузы и колледжи';
$metaDescription = 'Список партнерских вузов и колледжей Idea Teach. Выберите учебное заведение для получения качественного образования дистанционно.';
$metaKeywords = 'вузы, колледжи, партнерские учебные заведения, высшее образование, среднее профессиональное образование, дистанционное обучение';
?>

@include('layout.header')
<!-- Заголовок -->
<section class="bg-purple-800 text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Вузы и колледжи</h1>
        <p class="text-lg md:text-xl text-purple-200">Выберите учебное заведение для получения качественного образования</p>
    </div>
</section>

<!-- Список вузов -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($institutions as $institution)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105">
                @if($institution->logo)
                    <img src="{{ asset('storage/' . $institution->logo) }}" alt="{{ $institution->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-university text-4xl text-gray-400"></i>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">{{ $institution->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($institution->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-700 font-bold">
                            {{ $institution->type === 'university' ? 'Университет' : 'Колледж' }}
                        </span>
                        <a href="{{ route('institutions.show', ['slug' => $institution->slug]) }}" class="text-purple-700 hover:text-purple-800 font-medium">
                            Подробнее →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-university text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-600 mb-2">Вузы и колледжи не найдены</h3>
                <p class="text-gray-500">В данный момент нет доступных учебных заведений</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@include('layout.feedback')
@include('layout.footer')