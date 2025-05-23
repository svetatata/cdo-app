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
                <form id="applicationForm" class="space-y-4" action="{{ route('application.submit') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="name">Имя</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="input-field w-full" 
                                   placeholder="Введите ваше имя" 
                                   required 
                                   minlength="2">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="phone">Телефон</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   class="input-field w-full" 
                                   placeholder="Введите ваш телефон" 
                                   required 
                                   minlength="10">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="input-field w-full" 
                               placeholder="Введите ваш email" 
                               required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="degree">Образование</label>
                        <select id="degree" name="degree" class="input-field w-full" required>
                            <option value="">Выберите образование</option>
                            <option value="college">Колледж</option>
                            <option value="bachelor">Бакалавриат</option>
                            <option value="master">Магистратура</option>
                            <option value="training">Переподготовка</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="program_id">Программа</label>
                        <select id="program_id" name="program_id" class="input-field w-full" required disabled>
                            <option value="">Сначала выберите образование</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="message">Сообщение</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  class="input-field resize-none w-full" 
                                  placeholder="Ваш вопрос или комментарий"></textarea>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="agreeTerms" 
                               name="agree_terms" 
                               class="form-checkbox text-purple-600" 
                               required>
                        <label for="agreeTerms" class="ml-2 text-gray-600">
                            Я согласен с <a href="https://www.consultant.ru/document/cons_doc_LAW_61801/" 
                                          class="text-purple-600 hover:text-purple-800" 
                                          target="_blank">условиями обработки персональных данных</a>
                        </label>
                    </div>
                    <div id="applicationError" class="text-red-500 text-sm hidden"></div>
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
    
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Обработка отправки формы
document.getElementById('applicationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    const errorDiv = document.getElementById('applicationError');
    
    submitButton.disabled = true;
    submitButton.innerHTML = 'Отправка...';
    errorDiv.classList.add('hidden');
    errorDiv.textContent = '';
    
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            form.reset();
            alert(data.message);
            closeApplicationModal();
        } else {
            if (data.errors) {
                let errorMessage = '';
                for (const field in data.errors) {
                    errorMessage += data.errors[field][0] + '\n';
                }
                errorDiv.textContent = errorMessage;
                errorDiv.classList.remove('hidden');
            } else {
                errorDiv.textContent = data.message;
                errorDiv.classList.remove('hidden');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        errorDiv.textContent = 'Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.';
        errorDiv.classList.remove('hidden');
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Отправить заявку';
    });
});

// Обработка отправки формы на главной странице
const homeApplicationForm = document.getElementById('homeApplicationForm');
if (homeApplicationForm) {
    homeApplicationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitButton = form.querySelector('button[type="submit"]');
        const errorDiv = document.getElementById('homeApplicationError');
        
        submitButton.disabled = true;
        submitButton.innerHTML = 'Отправка...';
        errorDiv.classList.add('hidden');
        errorDiv.textContent = '';
        
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                form.reset();
                alert(data.message);
            } else {
                if (data.errors) {
                    let errorMessage = '';
                    for (const field in data.errors) {
                        errorMessage += data.errors[field][0] + '\n';
                    }
                    errorDiv.textContent = errorMessage;
                    errorDiv.classList.remove('hidden');
                } else {
                    errorDiv.textContent = data.message;
                    errorDiv.classList.remove('hidden');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorDiv.textContent = 'Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.';
            errorDiv.classList.remove('hidden');
        })
        .finally(() => {
            submitButton.disabled = false;
            submitButton.innerHTML = 'Отправить заявку';
        });
    });
}

// Обработка изменения образования
document.getElementById('degree').addEventListener('change', function() {
    const programSelect = document.getElementById('program_id');
    const degree = this.value;
    
    if (degree) {
        programSelect.disabled = false;
        programSelect.innerHTML = '<option value="">Загрузка программ...</option>';
        
        fetch(`/application/programs?degree=${degree}`)
            .then(response => response.json())
            .then(programs => {
                programSelect.innerHTML = '<option value="">Выберите программу</option>';
                programs.forEach(program => {
                    programSelect.innerHTML += `<option value="${program.id}">${program.title}</option>`;
                });
            })
            .catch(error => {
                console.error('Error:', error);
                programSelect.innerHTML = '<option value="">Ошибка загрузки программ</option>';
            });
    } else {
        programSelect.disabled = true;
        programSelect.innerHTML = '<option value="">Сначала выберите образование</option>';
    }
});
</script>