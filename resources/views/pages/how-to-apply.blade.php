<?php 
$pageTitle = 'Как поступить';
$metaDescription = 'Пошаговая инструкция по поступлению в Idea Teach. Выбор программы, подача заявки, подготовка документов и зачисление на обучение.';
$metaKeywords = 'как поступить, поступление в вуз, документы для поступления, заявка на обучение, дистанционное образование, пошаговая инструкция';
?>

@include('layout.header')

<main>
    <!-- Хедер страницы -->
    <section class="bg-purple-800 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Как поступить</h1>
            <p class="text-xl">Пошаговая инструкция для абитуриентов</p>
        </div>
    </section>

    <!-- Шаги поступления -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Шаг 1 -->
                <div class="flex flex-col md:flex-row gap-8 mb-16">
                    <div class="md:w-1/3">
                        <div class="bg-purple-100 rounded-lg p-6 text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-4">01</div>
                            <h3 class="text-xl font-bold mb-2">Выбор программы</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Выберите интересующую вас программу обучения из нашего каталога. Мы предлагаем программы колледжа, бакалавриата, магистратуры и профессиональной переподготовки.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Изучите описание программы</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Ознакомьтесь с учебным планом</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Уточните стоимость обучения</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Шаг 2 -->
                <div class="flex flex-col md:flex-row gap-8 mb-16">
                    <div class="md:w-1/3">
                        <div class="bg-purple-100 rounded-lg p-6 text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-4">02</div>
                            <h3 class="text-xl font-bold mb-2">Подача заявки</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Оставьте заявку на обучение через форму на сайте или позвоните нам. Наш менеджер свяжется с вами для уточнения деталей.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Заполните форму обратной связи</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Дождитесь звонка менеджера</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Получите консультацию по программе</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Шаг 3 -->
                <div class="flex flex-col md:flex-row gap-8 mb-16">
                    <div class="md:w-1/3">
                        <div class="bg-purple-100 rounded-lg p-6 text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-4">03</div>
                            <h3 class="text-xl font-bold mb-2">Подготовка документов</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Подготовьте необходимые документы для поступления. Мы поможем вам с оформлением всех бумаг.</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-bold mb-4">Необходимые документы:</h4>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-file-alt text-purple-600 mt-1 mr-3"></i>
                                    <span>Паспорт (копия)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-file-alt text-purple-600 mt-1 mr-3"></i>
                                    <span>Документ об образовании (копия)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-file-alt text-purple-600 mt-1 mr-3"></i>
                                    <span>Фотографии 3x4 (2 шт.)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-file-alt text-purple-600 mt-1 mr-3"></i>
                                    <span>СНИЛС (копия)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Шаг 4 -->
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/3">
                        <div class="bg-purple-100 rounded-lg p-6 text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-4">04</div>
                            <h3 class="text-xl font-bold mb-2">Зачисление</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">После проверки документов и оплаты обучения вы будете зачислены на выбранную программу.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Подписание договора</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Оплата обучения</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-purple-600 mt-1 mr-3"></i>
                                <span>Получение доступа к учебной платформе</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Часто задаваемые вопросы</h2>
            <div class="max-w-3xl mx-auto">
                <div class="space-y-6">
                    <!-- Вопрос 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <span class="font-bold">Нужно ли сдавать вступительные экзамены?</span>
                                <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                            </div>
                        </button>
                        <div class="px-6 py-4 hidden">
                            <p class="text-gray-600">Для поступления на большинство программ не требуется сдавать вступительные экзамены. Исключение составляют некоторые программы магистратуры, где может потребоваться собеседование.</p>
                        </div>
                    </div>

                    <!-- Вопрос 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <span class="font-bold">Можно ли получить налоговый вычет за обучение?</span>
                                <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                            </div>
                        </button>
                        <div class="px-6 py-4 hidden">
                            <p class="text-gray-600">Да, при обучении на программах высшего образования вы можете получить налоговый вычет в размере 13% от стоимости обучения.</p>
                        </div>
                    </div>

                    <!-- Вопрос 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <span class=" font-bold">Как проходит обучение?</span>
                                <i class="fas fa-chevron-down transition-transform text-purple-600"></i>
                            </div>
                        </button>
                        <div class="px-6 py-4 hidden">
                            <p class="text-gray-600">Обучение проходит на современной образовательной платформе. Вы получаете доступ к учебным материалам, участвуете в вебинарах, выполняете практические задания и сдаете экзамены онлайн.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма обратной связи -->
    @include('layout.feedback')
</main>

@include('layout.footer')

<script>
function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('i');
    
    content.classList.toggle('hidden');
    icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}
</script> 