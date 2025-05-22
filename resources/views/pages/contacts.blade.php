<?php $pageTitle = 'Контакты'?>

@include('layout.header')

<main>
    <!-- Хедер страницы -->
    <section class="bg-purple-800 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Контакты</h1>
            <p class="text-xl">Свяжитесь с нами любым удобным способом</p>
        </div>
    </section>

    <!-- Контактная информация -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Контактные данные -->
                <div>
                    <h2 class="text-2xl font-bold mb-8">Наши контакты</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Адрес</h3>
                                <p class="text-gray-600">г. Москва, ул. Примерная, д. 123</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Телефон</h3>
                                <p class="text-gray-600">+7 (999) 123-45-67</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Email</h3>
                                <p class="text-gray-600">info@ideateach.ru</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Режим работы</h3>
                                <p class="text-gray-600">Пн-Пт: 9:00 - 18:00</p>
                                <p class="text-gray-600">Сб-Вс: выходной</p>
                            </div>
                        </div>
                    </div>

                    <!-- Социальные сети -->
                    <div class="mt-12">
                        <h3 class="font-bold mb-4">Мы в социальных сетях</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center hover:bg-purple-200 transition-colors">
                                <i class="fab fa-vk text-purple-600 text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center hover:bg-purple-200 transition-colors">
                                <i class="fab fa-telegram text-purple-600 text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center hover:bg-purple-200 transition-colors">
                                <i class="fab fa-youtube text-purple-600 text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Форма обратной связи -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Напишите нам</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="name">Ваше имя</label>
                            <input type="text" id="name" class="input-field w-full" placeholder="Введите ваше имя">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="phone">Телефон</label>
                            <input type="tel" id="phone" class="input-field w-full" placeholder="Введите ваш телефон">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="message">Сообщение</label>
                            <textarea id="message" rows="4" class="input-field w-full" placeholder="Введите ваше сообщение"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">
                            Отправить сообщение
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Карта -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">Как нас найти</h2>
            <div class="h-96 rounded-lg overflow-hidden shadow-lg">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.4278534791646!2d37.6156!3d55.7522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTXCsDQ1JzA3LjkiTiAzN8KwMzYnNTYuMiJF!5e0!3m2!1sru!2sru!4v1234567890"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>
</main>

@include('layout.footer') 