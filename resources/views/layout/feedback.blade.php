{{-- <head>
    <script>
        console.log('Тест загрузки JS');
        alert('JS работает!');
    </script>
</head> --}}
<section class="py-12 bg-purple-800 text-white">
    <div class="container mx-auto px-4 max-w-5xl"> <!-- Уменьшил максимальную ширину контейнера -->
        <div class="flex flex-col md:flex-row gap-12 items-stretch justify-stretch"> <!-- Уменьшил gap между колонками -->
            <!-- Левая колонка с текстом -->
            <div class="md:w-1/3 text-center md:text-left max-w-md"> <!-- Уменьшил max-w -->
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Хотите учиться дистанционно, но остались вопросы?</h2> <!-- Уменьшил размер шрифта -->
                <p class="text-lg md:text-xl">Оставьте заявку и консультант приемной комиссии свяжется с вами</p>
            </div>
            
            <!-- Правая колонка с формой -->
            <div class="md:w-2/3 max-w-xl"> 
                <form class="flex flex-col gap-4" id="callRequestForm" action="/call-request" method="POST"> 
                    @csrf   
                <div class="flex flex-col md:flex-row gap-3"> 
                        <input 
                            type="text" 
                            name="name" id="name"
                            placeholder="Ваше имя" 
                            class="px-4 py-2 rounded-lg focus:outline-none ring-2 ring-violet-300 focus:ring-2 focus:ring-orange-400 flex-grow text-sm" 
                        >
                        <input 
                            type="tel" 
                            name="phone" id="phone"
                            placeholder="Телефон" 
                            class="px-4 py-2 rounded-lg focus:outline-none ring-2 ring-violet-300 focus:ring-2 focus:ring-orange-400 flex-grow text-sm"
                        >
                    </div>
                    <textarea 
                        name="message" id="message"
                        placeholder="Ваше сообщение (необязательно)"
                        class="px-4 py-2 rounded-lg focus:outline-none ring-2 ring-violet-300 focus:ring-2 focus:ring-orange-400 min-h-[80px] text-sm" 
                    ></textarea>
                    <div id="messageError" class="text-red-300 text-sm hidden"></div>
                    
                    <button 
                        type="submit" 
                        class="bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-full font-bold transition whitespace-nowrap w-full md:w-auto self-start text-sm" 
                    >
                        Заказать звонок
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
