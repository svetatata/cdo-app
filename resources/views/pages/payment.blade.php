<?php $pageTitle = 'Оплата и скидки'?>

@include('layout.header')
<main>
<!-- Заголовок страницы -->
<section class="bg-purple-800 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Оплата и скидки</h1>
        <p class="text-xl text-purple-100">Узнайте о способах оплаты и доступных скидках на обучение</p>
    </div>
</section>

<!-- Основной контент -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <!-- Способы оплаты -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Способы оплаты</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-purple-700 text-4xl mb-4">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Банковской картой</h3>
                    <p class="text-gray-600 mb-4">Оплата онлайн через защищенный платежный шлюз</p>
                    <div class="flex space-x-2">
                        <i class="fab fa-cc-visa text-2xl text-gray-400"></i>
                        <i class="fab fa-cc-mastercard text-2xl text-gray-400"></i>
                        <i class="fab fa-cc-mir text-2xl text-gray-400"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-purple-700 text-4xl mb-4">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Банковским переводом</h3>
                    <p class="text-gray-600">Оплата по реквизитам через любой банк</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-purple-700 text-4xl mb-4">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">По договору</h3>
                    <p class="text-gray-600">Оплата по договору с организацией</p>
                </div>
            </div>
        </div>

        <!-- Скидки -->
        <div class="bg-gray-50 rounded-2xl p-12 mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Доступные скидки</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full font-bold mr-4">
                            20%
                        </div>
                        <h3 class="text-xl font-semibold">При оплате за год</h3>
                    </div>
                    <p class="text-gray-600">Получите скидку 20% при оплате полной стоимости обучения за год</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full font-bold mr-4">
                            15%
                        </div>
                        <h3 class="text-xl font-semibold">При оплате за семестр</h3>
                    </div>
                    <p class="text-gray-600">Скидка 15% при оплате стоимости обучения за семестр</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full font-bold mr-4">
                            10%
                        </div>
                        <h3 class="text-xl font-semibold">Для выпускников</h3>
                    </div>
                    <p class="text-gray-600">Скидка 10% для выпускников наших программ при поступлении на новую программу</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full font-bold mr-4">
                            10%
                        </div>
                        <h3 class="text-xl font-semibold">При ранней оплате</h3>
                    </div>
                    <p class="text-gray-600">Скидка 5% при оплате до начала учебного года</p>
                </div>
            </div>
        </div>

        <!-- Налоговый вычет -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Налоговый вычет</h2>
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-start">
                    <div class="bg-purple-100 rounded-full p-3 mr-6">
                        <i class="fas fa-percentage text-purple-700 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Верните до 13% от стоимости обучения</h3>
                        <p class="text-gray-600 mb-4">Вы можете получить налоговый вычет за обучение, если:</p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6">
                            <li>Вы официально трудоустроены и платите НДФЛ</li>
                            <li>Учебное заведение имеет лицензию на образовательную деятельность</li>
                            <li>Вы оплатили обучение за себя, детей, братьев или сестер</li>
                        </ul>
                        <a href="https://www.nalog.gov.ru/rn77/taxation/taxes/ndfl/nalog_vichet/soc_nv/soc_nv_ob/" class="text-purple-600 hover:text-purple-800 font-medium">
                            Подробнее о налоговом вычете →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Форма обратной связи -->
        
    </div>
    
</section>
@include('layout.feedback')
</main>

@include('layout.footer') 