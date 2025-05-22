<?php $pageTitle = $institution->name ?>

@include('layout.header')
<main>
    <!-- Заголовок вуза -->
    <section class="bg-purple-800 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">{{ $institution->name }}</h1>
            <p class="text-xl">{{ $institution->type === 'university' ? 'Университет' : 'Колледж' }}</p>
        </div>
    </section>

    <!-- Основная информация -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-auto container px-4 py-8">
        <!-- Левая колонка -->
        <div class="md:col-span-2 space-y-8">
            <!-- О вузе -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">О заведении</h2>
                <div class="prose max-w-none">
                    {!! $institution->description !!}
                </div>
            </div>

            <!-- Программы -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Программы обучения</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($institution->programs as $program)
                    <div class="program-item p-4 border rounded-lg">
                        <h3 class="font-bold mb-2">{{ $program->name }}</h3>
                        <p class="text-gray-600">{{ $program->description }}</p>
                        <div class="mt-2">
                            <span class="text-purple-700 font-bold">{{ number_format($program->price, 0, ',', ' ') }} ₽/семестр</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Правая колонка -->
        <div class="space-y-8">
            <!-- Контакты -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Контакты</h2>
                <div class="space-y-4">
                    @if($institution->phone)
                    <div class="flex items-center">
                        <i class="fas fa-phone text-purple-600 mr-3"></i>
                        <span>{{ $institution->phone }}</span>
                    </div>
                    @endif
                    @if($institution->email)
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-purple-600 mr-3"></i>
                        <span>{{ $institution->email }}</span>
                    </div>
                    @endif
                    @if($institution->person)
                    <div class="flex items-center">
                        <i class="fas fa-user text-purple-600 mr-3"></i>
                        <span>{{ $institution->person }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Приемная комиссия -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Приемная комиссия</h2>
                <div class="space-y-4">
                    <p class="text-gray-600">Оставьте заявку, и мы свяжемся с вами для консультации</p>
                    <button onclick="showApplicationModal()" class="btn btn-primary w-full">
                        Подать заявку
                    </button>
                </div>
            </div>

            <!-- Логотип -->
            @if($institution->logo)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <img src="{{ asset('storage/' . $institution->logo) }}" alt="{{ $institution->name }}" class="w-full">
            </div>
            @endif
        </div>
    </section>
</main>
@include('layout.feedback')
@include('layout.footer')