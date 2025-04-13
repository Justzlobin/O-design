import $ from 'jquery';
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper from 'swiper';
import {FreeMode, Navigation, Pagination} from "swiper/modules";

import {register} from 'swiper/element/bundle';
import {Fancybox} from "@fancyapps/ui";

register();

const contactUsFormDiv = document.getElementById('_contact_us');
const loader = document.getElementById("loading-screen");

function initSwiper() {

    let swiper = new Swiper("#_project_thumb_swiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: "auto",
        freeMode: true,
        watchSlidesProgress: true,
    })

    new Swiper("#_project_main_swiper", {
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
            swiper: swiper,
        },
    });

    new Swiper("#_project__others_swiper", {
        loop: true,
        spaceBetween: 30,
        slidesPerView: "auto"
    });
}

$(document)
    .ready(function () {
        console.log("jQuery успішно підключено через Vite!");

        setInterval(function () {
            document.getElementById('loading-screen').classList.remove('_show')
        }, 350)

        if (window.location.href.includes("projects/")) {
            console.log('init swiper');
            initSwiper();
        }
    });

$('.mobile__menu')
    .on('click', function () {
        $('.submenu_wrap').removeClass('menu_show')
        $(this).toggleClass('active');
        $('.header__menu').toggleClass('mobile_show');
        $('.menu__item--content').removeClass('active')
        $('.header__mobile--decorate_line').toggleClass('show')
        document.querySelector('body').classList.toggle('_no_scroll')
    });

$('div.faq__content-item_question')
    .on('click', function () {
        let answers = document.querySelectorAll('div.faq__content-item_answer');
        let faqId = this.closest('.faq__content-item').dataset.faq_id;
        let targetAnswer = this.nextElementSibling;
        let targetAnswerHeight = targetAnswer.scrollHeight;

        answers.forEach(function (answer) {
            let faqDiv = answer.closest('div.faq__content-item');

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
        })
    });

$('div.mobile__menu')
    .on('click', function () {
            $('div#_header__menu_overlay').toggleClass('_show');
        }
    )

$('img._project__img')
    .on('click', function () {
        Fancybox.bind('[data-fancybox]');
    })

$('button#_file_upload_btn')
    .on('click', function (e) {
        this.classList.remove('_invalid')
        e.preventDefault();
        $('input#_file').click()
    })

$('button#_file_upload_clean_btn')
    .on('click', function (e) {
        e.preventDefault();
        let fileInput = document.getElementById('_file');
        fileInput.value = '';
        fileInput.dispatchEvent(new Event('change'));
    })

$('input#_file')
    .on('change', function () {
        let fileInput = document.getElementById('_file');
        let fileInputBtn = document.getElementById('_file_upload_btn');
        let cleanFileInputBtn = document.getElementById('_file_upload_clean_btn');
        if (fileInput && fileInput.files.length > 0) {
            cleanFileInputBtn.classList.add('_show');
            fileInputBtn.textContent = fileInput.files[0].name;
        } else {
            cleanFileInputBtn.classList.remove('_show');
            fileInputBtn.textContent = 'Add file';
        }
    })

// $('input._contact_us_input')
//     .on('click', function () {
//         this.closest('div._contact_us_input_wrap').style.borderColor = 'var(--lunar-green)';
//     })

$('button#_main__banner_contact_us_btn')
    .on('click', function (e) {
        e.preventDefault()
        let contactUsModal = document.getElementById('_contact_us_modal');

        if (contactUsModal.children.length === 0) {
            contactUsModal.appendChild(contactUsFormDiv.cloneNode(true))
            contactUsModal.classList.add('_show')
        }

        document.querySelector('body').classList.add('_no_scroll')
    })

$('div#_contact_us_modal')
    .on('click', function (e) {
        if (e.target.id === this.id) {
            document.getElementById('_contact_us_modal').classList.remove('_show')
            document.querySelector('body').classList.remove('_no_scroll')

            setTimeout(() => {
                document.getElementById('_contact_us_modal').replaceChildren()
            }, 500);
        }
    })

$('div#_header__menu_content')
    .on('click', function (e) {
        if (e.target.id === this.id) {
            document.getElementById('_header__menu_overlay').classList.remove('_show');
            document.querySelector('body').classList.remove('_no_scroll');
            document.querySelector('.mobile__menu').classList.remove('active')
        }
    })

// document.addEventListener("DOMContentLoaded", function () {
//     document.addEventListener("click", function (e) {
//         if (e.target.tagName === "A" && e.target.href) {
//             loader.classList.add('_show');
//         }
//     });
//     window.onload = function () {
//         loader.classList.remove('_show');
//     };
// });
