<!-- Модальное окно авторизации -->
<div id="authModal" class="fixed inset-0 bg-gradient-to-r from-purple-900 to-fuchsia-300  bg-opacity-50 z-50 hidden">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="authModalContent">
            <!-- Заголовок -->
            <div class="flex justify-between items-center p-6 border-b-2 border-purple-600">
                <h3 class="text-2xl font-bold">Вход в личный кабинет</h3>
                <button onclick="closeAuthModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Формы -->
            <div class="p-6">
                <!-- Переключение между формами -->
                <div class="flex mb-6">
                    <button data-auth-tab="login" onclick="showAuthModal('login')" class="flex-1 py-2 text-center border-b-2 border-gray-200 text-gray-500  font-bold">
                        Вход
                    </button>
                    <button data-auth-tab="register" onclick="showAuthModal('register')" class="flex-1 py-2 text-center border-b-2 border-gray-200 text-gray-500 font-bold">
                        Регистрация
                    </button>
                </div>

                <!-- Форма входа -->
                <form id="loginForm" class="space-y-4" action="/login" method="POST">
                    @csrf
                    <div>
                        <label class="block text-gray-700 mb-2" for="loginEmail">Email</label>
                        <input type="email" id="loginEmail" name="email" class="input-field w-full" placeholder="Введите ваш email" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="loginPassword">Пароль</label>
                        <input type="password" id="loginPassword" name="password" class="input-field w-full" placeholder="Введите ваш пароль" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="form-checkbox text-purple-600">
                            <span class="ml-2 text-gray-600">Запомнить меня</span>
                        </label>
                        <a href="#" class="text-purple-600 hover:text-purple-800">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">
                        Войти
                    </button>
                </form>

                <!-- Форма регистрации -->
                <form id="registerForm" class="space-y-4 hidden" action="/register" method="POST">
                    @csrf
                    <div>
                        <label class="block text-gray-700 mb-2" for="registerName">Имя</label>
                        <input type="text" id="registerName" name="name" class="input-field w-full" placeholder="Введите ваше имя" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="registerEmail">Email</label>
                        <input type="email" id="registerEmail" name="email" class="input-field w-full" placeholder="Введите ваш email" required>
                    </div>
                    <!--<div>
                        <label class="block text-gray-700 mb-2" for="registerPhone">Телефон</label>
                        <input type="tel" id="registerPhone" name="phone" class="input-field w-full" placeholder="Введите ваш телефон" required>
                    </div>-->
                    <div>
                        <label class="block text-gray-700 mb-2" for="registerPassword">Пароль</label>
                        <input type="password" id="registerPassword" name="password" class="input-field w-full" placeholder="Придумайте пароль" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="registerPasswordConfirm">Подтверждение пароля</label>
                        <input type="password" id="registerPasswordConfirm" name="password_confirmation" class="input-field w-full" placeholder="Повторите пароль" required>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="agreeTerms" name="agree_terms" class="form-checkbox text-purple-600" required>
                        <label for="agreeTerms" class="ml-2 text-gray-600">
                            Я согласен с <a href="#" class="text-purple-600 hover:text-purple-800">условиями использования</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">
                        Зарегистрироваться
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showAuthModal(tab = 'login') {
    const modal = document.getElementById('authModal');
    const modalContent = document.getElementById('authModalContent');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const loginTab = document.querySelector('[data-auth-tab="login"]');
    const registerTab = document.querySelector('[data-auth-tab="register"]');
    
    // Показываем модальное окно
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
    }, 10);
    
    // Переключаем на нужную вкладку
    if (tab === 'register') {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        loginTab.classList.remove('border-purple-600', 'text-purple-600');
        registerTab.classList.add('border-purple-600', 'text-purple-600');
    } else {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        loginTab.classList.add('border-purple-600', 'text-purple-600');
        registerTab.classList.remove('border-purple-600', 'text-purple-600');
    }
}

function closeAuthModal() {
    const modal = document.getElementById('authModal');
    const modalContent = document.getElementById('authModalContent');
    
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Обработка формы входа
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    const formData = new FormData(form);
    
    // Отключаем кнопку
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Вход...';
    
    fetch('/login', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert(data.message || 'Ошибка входа');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при входе');
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Войти';
    });
});

// Обработка формы регистрации
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    const formData = new FormData(form);
    
    // Отключаем кнопку
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Регистрация...';
    
    fetch('/register', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert(data.message || 'Ошибка регистрации');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при регистрации');
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Зарегистрироваться';
    });
});

// Закрытие модального окна при клике вне его
document.getElementById('authModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthModal();
    }
});
</script> 