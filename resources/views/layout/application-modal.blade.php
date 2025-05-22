<!-- Модальное окно подачи заявки -->
<div id="applicationModal" class="fixed inset-0 z-50 hidden">
    <!-- Полупрозрачный фон (без Tailwind) -->
    <div id="applicationModalBackdrop" style="position: fixed; inset: 0; background-color: rgba(0,0,0,0.5);"></div>
    
    <div class="min-h-screen flex items-center justify-center p-4" style="position: relative; z-index: 51;">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl transform transition-all duration-300 scale-95 opacity-0" id="applicationModalContent" style="max-height: 90vh; overflow-y: auto;">
            <!-- Заголовок -->
            <div class="flex justify-between items-center p-6 border-b-2 border-purple-600">
                <h3 class="text-2xl font-bold">Подать заявку на обучение</h3>
                <button onclick="closeApplicationModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Форма -->
            <div class="p-6">
                <form id="applicationForm" class="space-y-4" action="/application/submit" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="name">Имя</label>
                            <input type="text" id="name" name="name" class="input-field w-full" placeholder="Введите ваше имя" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone" class="input-field w-full" placeholder="Введите ваш телефон" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email" class="input-field w-full" placeholder="Введите ваш email" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="program">Программа обучения</label>
                        <select id="program" name="program" class="input-field w-full" required>
                            <option value="">Выберите программу</option>
                            <option value="college">Колледж</option>
                            <option value="bachelor">Бакалавриат</option>
                            <option value="master">Магистратура</option>
                            <option value="retraining">Переподготовка</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="direction">Направление</label>
                        <select id="direction" name="direction" class="input-field w-full" required>
                            <option value="">Выберите направление</option>
                            <option value="it">IT</option>
                            <option value="business">Бизнес</option>
                            <option value="education">Образование</option>
                            <option value="psychology">Психология</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="message">Сообщение</label>
                        <textarea id="message" name="message" rows="4" class="input-field resize-none w-full" placeholder="Ваш вопрос или комментарий"></textarea>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="agreeTerms" name="agree_terms" class="form-checkbox text-purple-600" required>
                        <label for="agreeTerms" class="ml-2 text-gray-600">
                            Я согласен с <a href="https://www.consultant.ru/document/cons_doc_LAW_61801/315f051396c88f1e4f827ba3f2ae313d999a1873/" class="text-purple-600 hover:text-purple-800">условиями обработки персональных данных</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">
                        Отправить заявку
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showApplicationModal() {
    const modal = document.getElementById('applicationModal');
    const modalContent = document.getElementById('applicationModalContent');
    
    modal.classList.remove('hidden');
    
    // Анимация появления снизу
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeApplicationModal() {
    const modal = document.getElementById('applicationModal');
    const modalContent = document.getElementById('applicationModalContent');
    
    // Анимация исчезновения
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    // Ждем окончания анимации перед скрытием
    setTimeout(() => {
        modal.classList.add('hidden');
        // Убрали document.body.style.overflow = 'auto' так как скролл не блокировали
    }, 300);
}

// Закрытие модального окна при клике вне его
document.getElementById('applicationModalBackdrop').addEventListener('click', function(e) {
    closeApplicationModal();
});

// Обработка отправки формы
document.getElementById('applicationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Здесь можно добавить валидацию формы
    
    // Отправка формы через AJAX
    fetch(this.action, {
        method: 'POST',
        body: new FormData(this),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Показываем сообщение об успехе
            alert('Заявка успешно отправлена!');
            closeApplicationModal();
        } else {
            // Показываем ошибку
            alert('Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.');
    });
});
</script>