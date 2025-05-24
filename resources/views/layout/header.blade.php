<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Idea Teach - {{ $pageTitle }}</title>
    
    <!-- SEO метатеги -->
    <meta name="description" content="{{ $metaDescription ?? 'Официальный сайт дистанционного обучения. Высшее образование, колледж, курсы и переподготовка.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'дистанционное обучение, дистанционное образование, высшее образование, колледж, курсы' }}">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Idea Teach - {{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Официальный сайт дистанционного обучения. Высшее образование, колледж, курсы и переподготовка.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.jpg') }}">
    
    <!-- Стили и скрипты -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vars.css') }}">
    <script src="{{ asset('js/mainscript.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
<!-- Верхняя панель -->
<div class="bg-gray-900 text-white py-2 px-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex space-x-6">
            <div class="flex items-center">
                <i class="far fa-clock text-orange-400 mr-2"></i>
                <span>Пн-Пт: 8:00-19:00 (МСК)</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-phone text-orange-400 mr-2"></i>
                <span>+7 (901) 270-77-55</span>
            </div>
        </div>
        <div class="flex space-x-4">
            @auth
                <a href="/profile" class="hover:text-orange-400 transition">
                    <i class="fas fa-user mr-1"></i> Профиль
                </a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-orange-400 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i> Выйти
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <button onclick="showAuthModal()" class="hover:text-orange-400 transition">
                    <i class="fas fa-user mr-1"></i> Войти
                </button>
                <button onclick="showAuthModal('register')" class="hover:text-orange-400 transition">
                    <i class="fas fa-user-plus mr-1"></i> Регистрация
                </button>
            @endauth
        </div>
    </div>
</div>

<!-- Навигация -->
<header class="sticky top-0 z-50 bg-purple-800 text-white shadow-lg" id="mainHeader">
    <div class="container mx-auto px-4">
        <nav class="flex justify-between items-center py-4">
            <a href="/" class="text-2xl font-bold flex items-center">
                <i class="fas fa-graduation-cap text-orange-400 mr-2"></i>
                Idea Teach
            </a>
            
            <!-- Десктоп меню -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="/" class="px-3 py-2 rounded hover:bg-purple-700 font-medium">Главная</a>
                <a href="/about" class="px-3 py-2 rounded hover:bg-purple-700 font-medium">О нас</a>
                
                <!-- Выпадающее меню -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" class="px-3 py-2 rounded hover:bg-purple-700 font-medium flex items-center">
                        Абитуриентам
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 delay-100"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95">
                        <a href="{{ route('programs.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Все программы</a>
                        <a href="{{ route('programs.index', ['degree' => 'college']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Колледж</a>
                        <a href="{{ route('programs.index', ['degree' => 'bachelor']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Бакалавриат</a>
                        <a href="{{ route('programs.index', ['degree' => 'master']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Магистратура</a>
                        <a href="{{ route('programs.index', ['degree' => 'training']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Переподготовка</a>
                        <a href="/how-to-apply" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Как поступить</a>
                        <a href="/how-to-study" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Как учиться</a>
                        {{-- <a href="/payment" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Оплата</a> --}}
                        
                    </div>
                </div>
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" class="px-3 py-2 rounded hover:bg-purple-700 font-medium flex items-center">
                        Вузы и колледжи
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 delay-100"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95">
                         <a href="/institutions" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">Все вузы и колледжи</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">ЯГК</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">ЯПЭК</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">ЯГТУ</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">ЯГПУ</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100">ЯГУ</a>
                    </div>
                </div>
                
                <a href="/payment" class="px-3 py-2 rounded hover:bg-purple-700 font-medium">Оплата</a>
                <a href="/contacts" class="px-3 py-2 rounded hover:bg-purple-700 font-medium">Контакты</a>
                <!-- Поиск -->
                <div class="relative ml-2">
                    <form action="{{ route('programs.index') }}" method="GET" class="flex items-center">
                        <input type="text" 
                               name="query" 
                               id="headerSearch"
                               placeholder="Поиск программ..." 
                               class="pl-10 pr-4 py-2 rounded-full focus:outline-none ring-2 ring-violet-300 focus:ring-orange-400">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </form>
                </div>
                
                <!-- Кнопка заявки -->
                <button onclick="showApplicationModal()" class="ml-4 btn btn-secondary px-4 py-2">
                    Подать заявку
                </button>
            </div>
            
            <!-- Мобильное меню (кнопка) -->
            <a class="md:hidden focus:outline-none" onclick="toggleMobileMenu()">
                <div class="w-6 h-6 flex flex-col justify-between">
                    <span class="w-full h-0.5 bg-white transform transition-all duration-300" id="burger-top"></span>
                    <span class="w-full h-0.5 bg-white transform transition-all duration-300" id="burger-middle"></span>
                    <span class="w-full h-0.5 bg-white transform transition-all duration-300" id="burger-bottom"></span>
                </div>
            </a>
        </nav>
    </div>
</header>

<!-- Мобильное меню -->
<div id="mobileMenu" class="fixed inset-0 bg-opacity-50 z-40 hidden">
    <div class="bg-white h-full w-64 transform transition-transform duration-300 -translate-x-full" id="mobileMenuContent">
        <div class="p-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Меню</h3>
                <button onclick="toggleMobileMenu()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="space-y-2">
                <a href="/" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Главная</a>
                <a href="/about" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">О нас</a>
                <div class="relative">
                    <button onclick="toggleMobileSubmenu('abiturient')" class="w-full px-4 py-2 text-left text-gray-800 hover:bg-purple-100 rounded flex justify-between items-center">
                        Абитуриентам
                        <i class="fas fa-chevron-down transition-transform duration-300" id="abiturient-arrow"></i>
                    </button>
                    <div id="abiturient-submenu" class="hidden pl-4 space-y-2">
                        <a href="{{ route('programs.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Все программы</a>
                        <a href="{{ route('programs.index', ['degree' => 'college']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Колледж</a>
                        <a href="{{ route('programs.index', ['degree' => 'bachelor']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Бакалавриат</a>
                        <a href="{{ route('programs.index', ['degree' => 'master']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Магистратура</a>
                        <a href="{{ route('programs.index', ['degree' => 'training']) }}" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Переподготовка</a>
                        <a href="/how-to-apply class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Как поступить</a>
                        <a href="/how-to-study" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Как учиться</a>
                        <a href="/payment" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Оплата</a>
                       
                    </div>
                </div>
                <div class="relative">
                    <button onclick="toggleMobileSubmenu('vuz')" class="w-full px-4 py-2 text-left text-gray-800 hover:bg-purple-100 rounded flex justify-between items-center">
                        Вузы и колледжи
                        <i class="fas fa-chevron-down transition-transform duration-300" id="vuz-arrow"></i>
                    </button>
                    <div id="vuz-submenu" class="hidden pl-4 space-y-2">
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">ЯГК</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">ЯПЭК</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">ЯГТУ</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">ЯГПУ</a>
                        <a href="/vuz" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">ЯГУ</a>
                    </div>
                </div>
                <a href="/payment" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Оплата</a>
                <a href="/contacts" class="block px-4 py-2 text-gray-800 hover:bg-purple-100 rounded">Контакты</a>
                <button onclick="showApplicationModal()" class="btn btn-outline-secondary w-full px-4 py-2 text-center hover:bg-orange-600">
                    Подать заявку
                </button>
            </nav>
        </div>
    </div>
</div>

@include('layout.auth-modal')
    @include('layout.application-modal')

<script>
    function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const menuContent = document.getElementById('mobileMenuContent');
    const burgerTop = document.getElementById('burger-top');
    const burgerMiddle = document.getElementById('burger-middle');
    const burgerBottom = document.getElementById('burger-bottom');
    const header = document.getElementById('mainHeader');
    
    menu.classList.toggle('hidden');
    menuContent.classList.toggle('-translate-x-full');
    
    // Изменяем z-index шапки
    if (!menu.classList.contains('hidden')) {
        header.style.zIndex = '30';
    } else {
        header.style.zIndex = '50';
    }
    
    // Анимация бургер-меню
    if (menu.classList.contains('hidden')) {
        // Возвращаем исходное состояние
        burgerTop.classList.remove('rotate-45', 'translate-y-2.5');
        burgerMiddle.classList.remove('opacity-0');
        burgerBottom.classList.remove('-rotate-45', '-translate-y-2.5');
    } else {
        // Анимация в крестик
        burgerTop.classList.add('rotate-45', 'translate-y-2.5');
        burgerMiddle.classList.add('opacity-0');
        burgerBottom.classList.add('-rotate-45', '-translate-y-2.5');
    }
}

function toggleMobileSubmenu(id) {
    const submenu = document.getElementById(`${id}-submenu`);
    const arrow = document.getElementById(`${id}-arrow`);
    
    submenu.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
}

// Закрытие мобильного меню при клике вне его
document.getElementById('mobileMenu').addEventListener('click', function(e) {
    if (e.target === this) {
        toggleMobileMenu();
    }
});

function logout() {
    if (confirm('Вы уверены, что хотите выйти?')) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch('/logout', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Произошла ошибка при выходе');
        });
    }
}
</script>