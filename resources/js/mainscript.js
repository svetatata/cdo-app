// Инициализация при загрузке документа
document.addEventListener('DOMContentLoaded', function() {
    // Инициализация дропдаунов
    initDropdowns();
    
    // Инициализация анимации при скролле
    initScrollAnimation();
    
    // Обработка форм
    initForms();
    
    // Мобильное меню
    initMobileMenu();
    
    // Инициализация слайдера
    initSlider();
    
    // Инициализация модальных окон
    initModals();
    
    // Обработка поиска в хедере
    const searchInput = document.getElementById('headerSearch');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                if (query) {
                    window.location.href = `${this.form.action}?query=${encodeURIComponent(query)}`;
                }
            }
        });
    }
});

// Функции инициализации
function initDropdowns() {
    const dropdowns = document.querySelectorAll('[data-dropdown]');
    
    dropdowns.forEach(dropdown => {
        const button = dropdown.querySelector('[data-dropdown-button]');
        const content = dropdown.querySelector('[data-dropdown-content]');
        
        if (button && content) {
            let timeout;
            
            button.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
                showDropdown(content);
            });
            
            dropdown.addEventListener('mouseleave', () => {
                timeout = setTimeout(() => {
                    hideDropdown(content);
                }, 200);
            });
            
            // Для мобильных устройств
            button.addEventListener('click', (e) => {
                e.preventDefault();
                if (content.classList.contains('hidden')) {
                    showDropdown(content);
                } else {
                    hideDropdown(content);
                }
            });
        }
    });
}

function showDropdown(content) {
    content.classList.remove('hidden', 'opacity-0', 'translate-y-2');
    content.classList.add('opacity-100', 'translate-y-0');
}

function hideDropdown(content) {
    content.classList.add('opacity-0', 'translate-y-2');
    content.classList.remove('opacity-100', 'translate-y-0');
    setTimeout(() => content.classList.add('hidden'), 200);
}

function initScrollAnimation() {
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementBottom = element.getBoundingClientRect().bottom;
            
            if (elementTop < window.innerHeight * 0.85 && elementBottom > 0) {
                element.classList.add('animate-fadeInUp');
                element.classList.remove('opacity-0', 'translate-y-8');
            }
        });
    };

    // Добавляем классы анимации ко всем секциям и карточкам
    document.querySelectorAll('section, .card, .bg-white, .bg-gray-50').forEach(element => {
        element.classList.add('animate-on-scroll', 'opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
    });

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Инициализация при загрузке
}

function initForms() {
    const forms = document.querySelectorAll('form');
    const loadingAnimation = document.querySelector('[data-loading]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (loadingAnimation) {
                loadingAnimation.classList.remove('hidden');
                
                // Имитация отправки данных
                setTimeout(() => {
                    loadingAnimation.classList.add('hidden');
                    alert('Ваша заявка принята! Мы свяжемся с вами в ближайшее время.');
                    form.reset();
                    
                    // Закрываем модальное окно, если оно есть
                    const modal = document.querySelector('[data-modal].flex');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                }, 2000);
            }
        });
    });
}

function initMobileMenu() {
    const mobileMenuButton = document.querySelector('[data-mobile-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
}

function initSlider() {
    const sliders = document.querySelectorAll('[data-slider]');
    
    sliders.forEach(slider => {
        const slides = slider.querySelectorAll('[data-slide]');
        const prevBtn = slider.querySelector('[data-slider-prev]');
        const nextBtn = slider.querySelector('[data-slider-next]');
        const dots = slider.querySelectorAll('[data-slider-dot]');
        
        let currentIndex = 0;
        let interval;
        
        function showSlide(index) {
            // Скрываем все слайды
            slides.forEach(slide => {
                slide.classList.add('hidden');
            });
            
            // Показываем текущий слайд
            slides[index].classList.remove('hidden');
            
            // Обновляем индикаторы
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-opacity-50');
                    dot.classList.add('bg-opacity-100');
                } else {
                    dot.classList.remove('bg-opacity-100');
                    dot.classList.add('bg-opacity-50');
                }
            });
            
            currentIndex = index;
        }
        
        function nextSlide() {
            const newIndex = (currentIndex + 1) % slides.length;
            showSlide(newIndex);
        }
        
        function prevSlide() {
            const newIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(newIndex);
        }
        
        function startAutoplay() {
            interval = setInterval(nextSlide, 5000);
        }
        
        function stopAutoplay() {
            clearInterval(interval);
        }
        
        // Инициализация
        showSlide(0);
        startAutoplay();
        
        // Обработчики событий
        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                stopAutoplay();
                prevSlide();
                startAutoplay();
            });
            
            nextBtn.addEventListener('click', () => {
                stopAutoplay();
                nextSlide();
                startAutoplay();
            });
        }
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoplay();
                showSlide(index);
                startAutoplay();
            });
        });
        
        // Пауза при наведении
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
    });
}

function initModals() {
    const modalButtons = document.querySelectorAll('[data-modal-toggle]');
    
    modalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-toggle');
            const modal = document.querySelector(`[data-modal="${modalId}"]`);
            
            if (modal) {
                modal.classList.toggle('hidden');
                
                // Добавляем обработчик закрытия по клику вне модального окна
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            }
        });
    });
}


function showApplicationModal() {
    const modal = document.getElementById('applicationModal');
    const modalContent = document.getElementById('applicationModalContent');
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Анимация появления снизу
    setTimeout(() => {
        modalContent.classList.remove('translate-y-full');
    }, 10);
}

function closeApplicationModal() {
    const modal = document.getElementById('applicationModal');
    const modalContent = document.getElementById('applicationModalContent');
    
    modalContent.classList.add('translate-y-full');
    
    // Ждем окончания анимации перед скрытием
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

// Функции для модального окна авторизации
function showAuthModal(form = 'login') {
    const modal = document.getElementById('authModal');
    const modalContent = document.getElementById('authModalContent');
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Анимация появления снизу
    setTimeout(() => {
        modalContent.classList.remove('translate-y-full');
    }, 10);
    
    // Показываем нужную форму
    if (form === 'register') {
        showAuthForm('register');
    }
}

function closeAuthModal() {
    const modal = document.getElementById('authModal');
    const modalContent = document.getElementById('authModalContent');
    
    modalContent.classList.add('translate-y-full');
    
    // Ждем окончания анимации перед скрытием
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

function showAuthForm(form) {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const buttons = document.querySelectorAll('#authModal .flex button');
    
    if (form === 'login') {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        buttons[0].classList.add('border-purple-600', 'text-purple-600');
        buttons[0].classList.remove('border-gray-200', 'text-gray-500');
        buttons[1].classList.add('border-gray-200', 'text-gray-500');
        buttons[1].classList.remove('border-purple-600', 'text-purple-600');
    } else {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        buttons[0].classList.add('border-gray-200', 'text-gray-500');
        buttons[0].classList.remove('border-purple-600', 'text-purple-600');
        buttons[1].classList.add('border-purple-600', 'text-purple-600');
        buttons[1].classList.remove('border-gray-200', 'text-gray-500');
    }
}

// Закрытие модального окна при клике вне его
document.getElementById('authModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthModal();
    }
});

// Обработка отправки форм
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
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
            window.location.reload();
        } else {
            alert(data.message || 'Ошибка при входе. Пожалуйста, проверьте введенные данные.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при входе. Пожалуйста, попробуйте позже.');
    });
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
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
            window.location.reload();
        } else {
            alert(data.message || 'Ошибка при регистрации. Пожалуйста, проверьте введенные данные.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при регистрации. Пожалуйста, попробуйте позже.');
    });
});

// Обработка клавиши Esc для модальных окон
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Закрываем модальное окно авторизации
        const authModal = document.getElementById('authModal');
        if (authModal && !authModal.classList.contains('hidden')) {
            closeAuthModal();
        }
        
        // Закрываем модальное окно заявки
        const applicationModal = document.getElementById('applicationModal');
        if (applicationModal && !applicationModal.classList.contains('hidden')) {
            closeApplicationModal();
        }
        
        // Закрываем мобильное меню
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
            toggleMobileMenu();
        }
    }
});

document.getElementById('callRequestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    const formData = new FormData(form);
    const messageError = document.getElementById('messageError');
    
    messageError.classList.add('hidden');
    messageError.textContent = '';
    
    submitButton.disabled = true;
    submitButton.innerHTML = 'Отправка...';
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
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
                alert(errorMessage);
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при отправке формы: ' + (error.message || 'Попробуйте позже'));
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Заказать звонок';
    });
});

