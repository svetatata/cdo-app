<!-- Подключаем Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <!-- Swiper -->
        <div class="swiper mainSwiper rounded-xl shadow-lg" style="height: 400px">
            <div class="swiper-wrapper">
                    @foreach([
                    ['image' => 'college.webp', 'title' => 'Образование в колледже', 'desc' => 'Получите среднее профессиональное образование дистанционно...', 'degree' => 'college'],
                    ['image' => 'bachelor.webp', 'title' => 'Бакалавриат', 'desc' => 'Первая ступень высшего образования...', 'degree' => 'bachelor'],
                    ['image' => 'master.jpg', 'title' => 'Магистратура', 'desc' => 'Углубленное изучение специальности...', 'degree' => 'master'],
                    ['image' => 'onlineedu.jpg', 'title' => 'Переподготовка', 'desc' => 'Освойте новую профессию за 3-6 месяцев...', 'degree' => 'training'],
                    ] as $slide)
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/banners/' . $slide['image']) }}" 
                             class="w-full h-full object-cover absolute inset-0" 
                             alt="{{ $slide['title'] }}">
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex items-center justify-center h-full px-6">
                            <div class="text-center text-white max-w-2xl">
                                <h3 class="text-3xl font-bold mb-4">{{ $slide['title'] }}</h3>
                                <p class="mb-6">{{ $slide['desc'] }}</p>
                                <a href="{{ route('programs.index', ['degree' => $slide['degree']]) }}" class="btn btn-secondary transition">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Добавляем навигацию -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Добавляем пагинацию -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Подключаем Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.mainSwiper', {
        // Основные параметры
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        
        // Эффект перехода
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        
        // Пагинация
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        
        // Навигация
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // Адаптивность
        breakpoints: {
            320: {
                height: 400,
            },
            768: {
                height: 500,
            }
        }
    });
});
</script>

<style>
/* Кастомизация стилей Swiper */
.swiper-button-next,
.swiper-button-prev {
    color: white !important;
    background: rgba(0, 0, 0, 0.3);
    width: 50px !important;
    height: 50px !important;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: rgba(0, 0, 0, 0.5);
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 24px !important;
}

.swiper-pagination-bullet {
    background: white !important;
    opacity: 0.5;
    width: 12px !important;
    height: 12px !important;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: var(--color-orange-500) !important;
}

@media (max-width: 768px) {
    .swiper.mainSwiper {
        height: 400px !important;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 40px !important;
        height: 40px !important;
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px !important;
    }
}
</style>
    