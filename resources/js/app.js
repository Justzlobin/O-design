// Видаляємо імпорт jQuery і додаємо інші необхідні імпорти
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper from 'swiper';
import {FreeMode, Navigation, Pagination} from "swiper/modules";
import {register} from 'swiper/element/bundle';
import {Fancybox} from "@fancyapps/ui";

import Inputmask from "inputmask/lib/inputmask.js";

// Ініціалізація Swiper
register();

// Функція для генерації хешу
const generateHash = (str) => {
    let hash = 0;
    if (str.length === 0) return hash.toString(16);

    for (let i = 0; i < str.length; i++) {
        const char = str.charCodeAt(i);
        hash = ((hash << 5) - hash) + char;
        hash = hash & hash; // Convert to 32bit integer
    }

    return hash.toString(16);
};

// Кешування DOM-елементів для оптимізації
const DOM = {
    contactUsForm: document.getElementById('_contact_us'),
    loader: document.getElementById("loading-screen"),
    body: document.querySelector('body'),
    mobileMenu: document.querySelector('.mobile__menu'),
    headerMenu: document.querySelector('.header__menu'),
    faqQuestions: document.querySelectorAll('div.faq__content-item_question'),
    headerMenuOverlay: document.getElementById('_header__menu_overlay'),
    projectImages: document.querySelectorAll('img._project__img'),
    // fileUploadBtn: document.getElementById('_file_upload_btn'),
    // fileUploadCleanBtn: document.getElementById('_file_upload_clean_btn'),
    // fileInput: document.getElementById('_file'),
    contactUsBtn: document.getElementById('_main__banner_contact_us_btn'),
    contactUsModal: document.getElementById('_contact_us_modal'),
    headerMenuContent: document.getElementById('_header__menu_content'),
    projectFilters: {
        all: document.getElementById('all'),
        commercial: document.getElementById('commercial'),
        privat: document.getElementById('privat')
    },
    projectItems: {
        all: document.querySelectorAll('.projects__grid-item'),
        privat: document.querySelectorAll('.projects__grid-item.privat'),
        commercial: document.querySelectorAll('.projects__grid-item.commercial')
    },
    themeSwitch: document.querySelector('.theme-switch input[type="checkbox"]'),
    planButtons: document.querySelectorAll('.plan__btn')
};

// Зберігаємо інстанси Swiper для можливого повторного використання
const swiperInstances = {};

// Функція ініціалізації Swiper з обробкою помилок
function initSwiper() {
    try {
        const thumbSwiper = new Swiper("#_project_thumb_swiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: "auto",
            freeMode: true,
            watchSlidesProgress: true,
        });

        swiperInstances.thumbs = thumbSwiper;

        const mainSwiper = new Swiper("#_project_main_swiper", {
            modules: [FreeMode, Navigation, Pagination],
            slidesPerView: "auto",
            freeMode: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: thumbSwiper,
            },
        });

        swiperInstances.main = mainSwiper;

        const othersSwiper = new Swiper("#_project__others_swiper", {
            loop: true,
            spaceBetween: 30,
            slidesPerView: "auto"
        });

        swiperInstances.others = othersSwiper;
    } catch (error) {
        console.error('Помилка ініціалізації Swiper:', error);
    }
}


// Функція для додавання обробників подій
function addEventListeners() {
    // DOMContentLoaded (заміна jQuery ready)
    document.addEventListener('DOMContentLoaded', () => {
        console.log("DOM повністю завантажено!");

        // Видалення екрану завантаження
        setTimeout(() => {
            if (DOM.loader) DOM.loader.classList.remove('_show');
        }, 350);

        // Ініціалізація Swiper на сторінках проектів
        if (window.location.href.includes("projects/")) {
            console.log('Ініціалізація Swiper');
            initSwiper();
        }

        // Хешування ідентифікаторів для елементів FAQ
        if (DOM.faqQuestions.length > 0) {
            DOM.faqQuestions.forEach((question, index) => {
                const faqItem = question.closest('.faq__content-item');
                if (faqItem && !faqItem.dataset.faq_id) {
                    const uniqueId = generateHash(`faq-${index}-${Date.now()}`);
                    faqItem.dataset.faq_id = uniqueId;
                }
            });
        }

        activateInputMast()
    });

    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        const loader = document.getElementById('loading-screen');

        if (notification) {
            // Check if loader exists and wait for it to be hidden
            if (loader) {
                // Create a MutationObserver to watch for changes to the loader's classList
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'class' && !loader.classList.contains('_show')) {
                            // Loader has been hidden, show the notification
                            notification.style.display = 'block';

                            // Make notification fade out after 5 seconds
                            setTimeout(function() {
                                notification.classList.add('fade-out');
                            }, 5000);

                            // Remove notification from DOM after fade out animation completes
                            setTimeout(function() {
                                notification.remove();
                            }, 5500);

                            // Disconnect the observer since we don't need it anymore
                            observer.disconnect();
                        }
                    });
                });

                // Start observing the loader element
                observer.observe(loader, { attributes: true });
            } else {
                // If there's no loader, just show the notification directly
                notification.style.display = 'block';

                // Make notification fade out after 5 seconds
                setTimeout(function() {
                    notification.classList.add('fade-out');
                }, 5000);

                // Remove notification from DOM after fade out animation completes
                setTimeout(function() {
                    notification.remove();
                }, 5500);
            }
        }
    });

    // Мобільне меню
    if (DOM.mobileMenu) {
        DOM.mobileMenu.addEventListener('click', () => {
            DOM.mobileMenu.classList.toggle('active');
            DOM.headerMenu.classList.toggle('mobile_show');
            // DOM.menuItemContent.forEach(item => item.classList.remove('active'));
            // DOM.decorateLine.classList.toggle('show');
            DOM.body.classList.toggle('_no_scroll');

            if (DOM.headerMenuOverlay) {
                DOM.headerMenuOverlay.classList.toggle('_show');
            }
        });
    }

    // FAQ питання
    if (DOM.faqQuestions.length > 0) {
        DOM.faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answers = document.querySelectorAll('div.faq__content-item_answer');
                const faqId = question.closest('.faq__content-item').dataset.faq_id;
                const targetAnswer = question.nextElementSibling;
                const targetAnswerHeight = targetAnswer.scrollHeight;

                answers.forEach(answer => {
                    const faqDiv = answer.closest('div.faq__content-item');

                    if (faqDiv.dataset.faq_id !== faqId) {
                        answer.classList.remove('_show');
                        answer.style = '';
                    } else {
                        if (answer.classList.contains('_show')) {
                            answer.classList.remove('_show');
                            answer.style = '';
                        } else {
                            answer.classList.add('_show');
                            answer.style.maxHeight = targetAnswerHeight + 'px';
                            answer.style.marginTop = '20px';
                        }
                    }
                });
            });
        });
    }

    // Зображення проектів та Fancybox
    if (DOM.projectImages.length > 0) {
        DOM.projectImages.forEach(img => {
            img.addEventListener('click', () => {
                Fancybox.bind('[data-fancybox]');
            });
        });
    }

    // Обробка завантаження файлів
    // if (DOM.fileUploadBtn) {
    //     DOM.fileUploadBtn.addEventListener('click', (e) => {
    //         DOM.fileUploadBtn.classList.remove('_invalid');
    //         e.preventDefault();
    //         DOM.fileInput.click();
    //     });
    // }
    //
    // if (DOM.fileUploadCleanBtn) {
    //     DOM.fileUploadCleanBtn.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         if (DOM.fileInput) {
    //             DOM.fileInput.value = '';
    //             DOM.fileInput.dispatchEvent(new Event('change'));
    //         }
    //     });
    // }

    // if (DOM.fileInput) {
    //     DOM.fileInput.addEventListener('change', () => {
    //         if (DOM.fileInput && DOM.fileInput.files.length > 0) {
    //             DOM.fileUploadCleanBtn.classList.add('_show');
    //             DOM.fileUploadBtn.textContent = DOM.fileInput.files[0].name;
    //         } else {
    //             DOM.fileUploadCleanBtn.classList.remove('_show');
    //             DOM.fileUploadBtn.textContent = 'Add file';
    //         }
    //     });
    // }

    // Контактна форма
    if (DOM.contactUsBtn) {
        DOM.contactUsBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showContactForm();
            activateInputMast()
        });
    }

    if (DOM.contactUsModal) {
        DOM.contactUsModal.addEventListener('click', (e) => {
            if (e.target.id === DOM.contactUsModal.id) {
                hideContactForm();
            }
        });
    }

    if (DOM.headerMenuContent) {
        DOM.headerMenuContent.addEventListener('click', (e) => {
            if (e.target.id === DOM.headerMenuContent.id) {
                if (DOM.headerMenuOverlay) DOM.headerMenuOverlay.classList.remove('_show');
                DOM.body.classList.remove('_no_scroll');
                if (DOM.mobileMenu) DOM.mobileMenu.classList.remove('active');
            }
        });
    }

    // Фільтри проектів
    const setupProjectFilter = (filterId, displayItems, hideItems) => {
        const filterElement = document.getElementById(filterId);
        if (!filterElement) return;

        filterElement.addEventListener('click', () => {
            document.querySelectorAll('.projects__choose--btn').forEach(el => {
                el.classList.remove('_selected');
            });
            filterElement.classList.add('_selected');

            displayItems.forEach(el => {
                el.style.display = 'flex';
            });

            if (hideItems) {
                hideItems.forEach(el => {
                    el.style.display = 'none';
                });
            }
        });
    };

    if (DOM.projectFilters.all) {
        setupProjectFilter('all', DOM.projectItems.all);
    }

    if (DOM.projectFilters.privat) {
        setupProjectFilter('privat', DOM.projectItems.privat, DOM.projectItems.commercial);
    }

    if (DOM.projectFilters.commercial) {
        setupProjectFilter('commercial', DOM.projectItems.commercial, DOM.projectItems.privat);
    }

    // Перемикач теми
    if (DOM.themeSwitch) {
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
            if (currentTheme === 'dark') {
                DOM.themeSwitch.checked = true;
            }
        }

        DOM.themeSwitch.addEventListener('change', (e) => {
            const theme = e.target.checked ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);

            // Додаємо хешування для ідентифікації теми
            const themeHash = generateHash(`theme-${theme}-${Date.now()}`);
            document.documentElement.dataset.themeId = themeHash;
        });
    }

    // Кнопки плану
    if (DOM.planButtons.length > 0) {
        DOM.planButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                showContactForm();
            });
        });
    }
}

// Допоміжні функції
function showContactForm() {
    if (!DOM.contactUsModal || !DOM.contactUsForm) return;

    if (DOM.contactUsModal.children.length === 0) {
        DOM.contactUsModal.appendChild(DOM.contactUsForm.cloneNode(true));
        DOM.contactUsModal.classList.add('_show');
    }

    DOM.body.classList.add('_no_scroll');
}

function hideContactForm() {
    if (!DOM.contactUsModal) return;

    DOM.contactUsModal.classList.remove('_show');
    DOM.body.classList.remove('_no_scroll');

    setTimeout(() => {
        DOM.contactUsModal.replaceChildren();
    }, 500);
}

// Ініціалізація всіх обробників подій
addEventListeners();

// Експорт для можливого використання в інших модулях
export { swiperInstances, generateHash };

function activateInputMast() {
    Inputmask({
        mask: [
            "+380(99)999-99-99",
            // "0(99)999-99-99",
            // "+38 099 999 99 99",
            // "380999999999"
        ],
        showMaskOnHover: false,
        showMaskOnFocus: true,
        clearIncomplete: true
    }).mask('._contact_us_input._tel');
}



