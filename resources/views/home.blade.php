<?php 
$pageTitle = 'Главная';
$metaDescription = 'Официальный сайт дистанционного обучения. Высшее образование, колледж, курсы и переподготовка.';
$metaKeywords = 'дистанционное обучение, дистанционное образование, дистанционное обучение высшее, дистанционное обучение колледж, дистанционное обучение 2025, дистанционное обучение официальный сайт, дистанционное обучение курсы';
?>

    @include('layout.header')
    <main>
        <section class="relative bg-gradient-to-r from-purple-900 to-fuchsia-300 text-white py-20">
            <div class="container mx-auto px-4 flex flex-col gap-20 md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Дистанционное образование с Idea Teach</h1>
                    <p class="text-xl mb-8">Официальный представитель ведущих вузов и колледжей России</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('application.create') }}" class="btn btn-secondary">
                            Подать заявку
                        </a>
                        <a href="{{ route('how-to-study') }}" class="btn btn-outline-secondary">
                            Узнать больше
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 bg-white bg-opacity-90 rounded-xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Хотите учиться дистанционно?</h3>
                    <form id="homeApplicationForm" class="space-y-4" action="{{ route('application.submit') }}" method="POST">
                        @csrf
                        <input type="text" 
                               name="name" 
                               placeholder="ФИО" 
                               class="input-field" 
                               required 
                               minlength="2">
                        <input type="email" 
                               name="email" 
                               placeholder="Email" 
                               class="input-field" 
                               required>
                        <input type="tel" 
                               name="phone" 
                               placeholder="Телефон" 
                               class="input-field" 
                               required 
                               minlength="10">
                        <select name="program" class="input-field" required>
                            <option value="">Выберите желаемое образование</option>
                            <option value="college">Колледж</option>
                            <option value="bachelor">Бакалавриат</option>
                            <option value="master">Магистратура</option>
                            <option value="retraining">Переподготовка</option>
                        </select>
                        <select name="direction" class="input-field" required>
                            <option value="">Выберите направление</option>
                            <option value="it">IT</option>
                            <option value="business">Бизнес</option>
                            <option value="education">Образование</option>
                            <option value="psychology">Психология</option>
                        </select>
                        <textarea name="message" 
                                  placeholder="Ваше сообщение (необязательно)" 
                                  class="input-field resize-none" 
                                  rows="3"></textarea>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="homeAgreeTerms" 
                                   name="agree_terms" 
                                   class="form-checkbox text-purple-600" 
                                   required>
                            <label for="homeAgreeTerms" class="ml-2 text-sm text-gray-600">
                                Я согласен с <a href="https://www.consultant.ru/document/cons_doc_LAW_61801/" 
                                              class="text-purple-600 hover:text-purple-800" 
                                              target="_blank">условиями обработки персональных данных</a>
                            </label>
                        </div>
                        <div id="homeApplicationError" class="text-red-500 text-sm hidden"></div>
                        <button type="submit" class="btn btn-primary w-full">
                            Отправить заявку
                        </button>
                    </form>
                </div>
            </div>
        </section>

        @include('sections.carousel')
        
        <!-- О нас -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="md:w-1/2">
                        <img src="{{asset('images/about.jpg')}}" 
                             alt="Центр дистанционного обучения Idea Teach" 
                             class="rounded-lg w-full"
                             loading="lazy"/>
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-3xl font-bold mb-6">Центр дистанционного обучения Idea Teach</h2>
                        <p class="mb-6">Мы - официальный представитель ведущих российских вузов и колледжей.</p>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-500 mt-1 mr-2"></i>
                                <span>Подбор учебного заведения по вашим критериям</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-500 mt-1 mr-2"></i>
                                <span>Помощь в оформлении документов</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-500 mt-1 mr-2"></i>
                                <span>Сопровождение на всех этапах обучения</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-500 mt-1 mr-2"></i>
                                <span>Техническая поддержка и консультации</span>
                            </li>
                        </ul>
                        <a href="{{ route('about') }}" class="btn btn-primary">Подробнее о нас</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Популярные программы -->
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Популярные программы обучения</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($randomPrograms as $program)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105">
                    @if($program->image)
                        <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }} - программа обучения" class="w-full h-48 object-cover"
                        loading="lazy">
                    @else
                        <div class="w-full h-48 object-cover bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-4xl text-gray-400"></i>
                        </div>
                    @endif   

                        <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">{{ $program->title }}</h3>
                            <p class="text-gray-600 mb-4">
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
                                    @default
                                        Неизвестно
                                @endswitch,
                                срок обучения {{ $program->duration_months }} мес.
                                {{ $program->short_description }}
                            </p>
                                            <div class="flex justify-between items-center">
                                <span class="text-purple-700 font-bold">от {{ number_format($program->price, 0, ',', ' ') }} ₽/семестр</span>
                                <a href="{{ route('programs.show', ['slug' => $program->slug]) }}" class="text-purple-700 hover:text-purple-800 font-medium">Подробнее →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('programs.index') }}" class="btn btn-outline-primary">Все программы обучения</a>
                </div>
            </div>
        </section>

        <!-- Партнерские вузы -->
        <section class="py-12 bg-purple-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Мы сотрудничаем с вузами</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($randomInstitutions as $institution)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($institution->logo)
                    <img src="{{ asset('storage/' . $institution->logo) }}" alt="{{ $institution->name }}" class="w-full h-48 object-cover" loading="lazy">
                @else
                    <div class="w-full h-48 object-cover bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-university text-4xl text-gray-400"></i>
                    </div>
                @endif    

                             
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3">{{ $institution->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $institution->description }}</p>
                            <a href="{{ route('institutions.show', ['slug' => $institution->slug]) }}" class="text-purple-700 hover:text-purple-800 font-medium">Подробнее →</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('institutions.index') }}" class="btn btn-outline-primary">Все вузы и колледжи</a>
                </div>
            </div>
        </section>

        <!-- Преимущества -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Почему выбирают Idea Teach?</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Преимущество 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Поддержка обучения</h3>
                        <p class="text-gray-600">Вы никогда не останетесь одни в процессе поступления и обучения! Наши специалисты всегда на связи и готовы помочь.</p>
                    </div>
                    
                    <!-- Преимущество 2 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Современный формат</h3>
                        <p class="text-gray-600">Учитесь где и когда удобно! Доступ к учебным материалам 24/7 с любого устройства.</p>
                    </div>
                    
                    <!-- Преимущество 3 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Диплом гос. образца</h3>
                        <p class="text-gray-600">Все выпускники получают дипломы государственного образца, которые вносятся в реестр ФРДО.</p>
                    </div>
                    
                    <!-- Преимущество 4 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Гибкий график</h3>
                        <p class="text-gray-600">Сдавайте экзамены и зачеты в удобное время без привязки к строгому расписанию.</p>
                    </div>
                    
                    <!-- Преимущество 5 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Доступная стоимость</h3>
                        <p class="text-gray-600">Обучение дешевле очного формата, возможна рассрочка платежа и скидки.</p>
                    </div>
                    
                    <!-- Преимущество 6 -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md transition-transform hover:scale-105">
                        <div class="text-purple-700 text-4xl mb-4 transform transition-all duration-300 hover:scale-110 hover:rotate-12">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Практическая направленность</h3>
                        <p class="text-gray-600">Программы ориентированы на практическое применение знаний в профессиональной деятельности.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Форма обратной связи -->
        @include('layout.feedback')
    </main>
    @include('layout.footer')

    
    