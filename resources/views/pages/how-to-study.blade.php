<?php 
$pageTitle = 'Как учиться';
$metaDescription = 'Узнайте о процессе дистанционного обучения в Idea Teach. Онлайн-лекции, практические задания, поддержка преподавателей и техническая помощь.';
$metaKeywords = 'дистанционное обучение, онлайн образование, как учиться дистанционно, процесс обучения, вебинары, практические задания, техническая поддержка';
?>

@include('layout.header')
    <main>
        <section>
            <h1 class="text-4xl font-bold mb-8">Как учиться</h1>
        </section>
        
        
        <!-- FAQ Section -->
        <section class="max-w-3xl mx-auto">
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Как начать обучение?</h3>
                            <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">Для начала обучения вам нужно:</p>
                        <ol class="list-decimal list-inside mt-2 space-y-2">
                            <li>Выбрать интересующую вас программу</li>
                            <li>Заполнить заявку на обучение</li>
                            <li>Дождаться подтверждения от менеджера</li>
                            <li>Оплатить обучение</li>
                            <li>Начать обучение в удобное для вас время</li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Как проходит обучение?</h3>
                            <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">Обучение проходит в формате:</p>
                        <ul class="list-disc list-inside mt-2 space-y-2">
                            <li>Онлайн-лекции с преподавателями</li>
                            <li>Практические задания</li>
                            <li>Групповые проекты</li>
                            <li>Индивидуальные консультации</li>
                            <li>Доступ к учебным материалам 24/7</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Какие требования к оборудованию?</h3>
                            <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">Для комфортного обучения вам потребуется:</p>
                        <ul class="list-disc list-inside mt-2 space-y-2">
                            <li>Компьютер или ноутбук</li>
                            <li>Стабильное интернет-соединение</li>
                            <li>Веб-камера и микрофон для участия в онлайн-занятиях</li>
                            <li>Базовые навыки работы с компьютером</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Как получить помощь в обучении?</h3>
                            <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">Мы предоставляем различные виды поддержки:</p>
                        <ul class="list-disc list-inside mt-2 space-y-2">
                            <li>Консультации с преподавателями</li>
                            <li>Техническая поддержка</li>
                            <li>Чат с одногруппниками</li>
                            <li>Доступ к дополнительным материалам</li>
                            <li>Помощь в трудоустройстве</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @include('layout.feedback')
</main>

@include('layout.footer')

    <script>
        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.fa-chevron-down');
            
            content.classList.toggle('hidden');
            icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }
    </script>

