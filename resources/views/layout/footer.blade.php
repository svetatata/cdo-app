<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-xl font-bold mb-4">Idea Teach</h4>
                <p class="mb-4">Центр дистанционного обучения. Официальный представитель российских вузов и колледжей.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-2xl hover:text-orange-400 transition"><i class="fab fa-vk"></i></a>
                    <a href="#" class="text-2xl hover:text-orange-400 transition"><i class="fab fa-telegram"></i></a>
                    <a href="#" class="text-2xl hover:text-orange-400 transition"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-2xl hover:text-orange-400 transition"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div>
                <h4 class="text-xl font-bold mb-4">Навигация</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-orange-400 transition">Главная</a></li>
                    <li><a href="/about" class="hover:text-orange-400 transition">О нас</a></li>
                    <li><a href="/how-to-apply" class="hover:text-orange-400 transition">Как поступить</a></li>
                    <li><a href="/how-to-study" class="hover:text-orange-400 transition">Как учиться</a></li>
                    <li><a href="/payment" class="hover:text-orange-400 transition">Оплата и скидки</a></li></ul>
            </div>
            
            <div>
                <h4 class="text-xl font-bold mb-4">Абитуриенту</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-orange-400 transition">Колледж</a></li>
                    <li><a href="#" class="hover:text-orange-400 transition">Бакалавриат</a></li>
                    <li><a href="#" class="hover:text-orange-400 transition">Магистратура</a></li>
                    <li><a href="#" class="hover:text-orange-400 transition">Переподготовка</a></li>
                    <li><a href="/programs" class="hover:text-orange-400 transition">Все программы</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-xl font-bold mb-4">Контакты</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-2 text-orange-400"></i>
                        <span>г. Ярославль, ул. Чайковского, д. 55</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone mt-1 mr-2 text-orange-400"></i>
                        <span>+7 (901) 270-77-55</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope mt-1 mr-2 text-orange-400"></i>
                        <span>info@idea-teach.ru</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-clock mt-1 mr-2 text-orange-400"></i>
                        <span>Пн-Пт: 8:00-19:00 (МСК)</span>
                    </li></ul>
                </div>
        </div>
    </div>
</footer>
<!-- Скрипты -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="{{ asset('js/mainscript.js')}}"></script>
@vite('resources/js/app.js')
</body>
</html>