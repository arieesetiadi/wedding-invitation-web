const backsound = new Audio('assets/audios/backsound.mp3');
const loading = document.querySelector('#loading');
const floatingButtons = document.querySelector('.floating-buttons');
const backsoundToggler = document.querySelector('#btn-backsound-toggler');

const csrf = document.querySelector('meta[name=csrf]').getAttribute('content');
const baseUrl = document.querySelector('meta[name=url]').getAttribute('content');

document.addEventListener('DOMContentLoaded', function () {
    new Swiper(".swiper-gallery", {
        spaceBetween: 20,
        slidesPerView: 1.2,
        breakpoints: {
            1024: {
                slidesPerView: 3,
            }
        }
    });
    
    fetchRsvpsDesktop();
    fetchRsvpsMobile();

    // setCountdown();

    // setInterval(() => {
    //     setCountdown();
    // }, 1000 * 60 * 60);
});

window.addEventListener('load', function () {
    loading.classList.add('loaded');
    setTimeout(() => {
        loading.remove();
    }, 500);
});

window.addEventListener('scroll', function () {
    if (this.window.scrollY >= 300) {
        floatingButtons.style.opacity = 1;
    }
    // 
    else {
        floatingButtons.style.opacity = 0;
    }
});

function initAOS() {
    AOS.init({
        offset: 120,
        duration: 750,
        easing: 'ease-in-out',
        once: true,
    });
}

function openInvitation() {
    const onboarding = document.querySelector('.onboarding');
    const main = document.querySelector('main');
    const scrollInfo = document.querySelector('main #hero .scroll-info');

    main.classList.remove('d-none');
    main.classList.add('openned');
    onboarding.classList.add('closed');

    setTimeout(() => {
        scrollInfo.style.opacity = 1;
    }, 100);

    initAOS();
    playBacksound();
}

function setCountdown() {
    const targetDate = new Date('2025-2-15');
    const currentDate = new Date();

    const ms = targetDate - currentDate;
    const days = Math.floor(ms / (1000 * 60 * 60 * 24));

    document.querySelector('.timer-days .number').textContent = days;
}

function copyToClipboard(event, selector) {
    const text = document.querySelector(selector);
    const textarea = document.createElement("textarea");
    const btnCopy = event.target;
    const alertCopied = btnCopy
        .parentElement
        .querySelector('.btn-copied');

    textarea.value = text.innerText;

    document.body.appendChild(textarea);

    textarea.select();
    textarea.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(textarea.value).then(function () {
        alertCopied.classList.remove('hidden');
        setTimeout(() => {
            alertCopied.classList.add('hidden');
        }, 2000);
    }, function (err) {
        console.error(err);
    });

    document.body.removeChild(textarea);
}

function toggleGuestCount(event) {
    const isAttend = event.target.value == '1';
    const guestCountWrapper = document.querySelector('.guest-count-wrapper');
    const guestCountSelect = guestCountWrapper.querySelector('select[name=num_guest]');

    if (!isAttend) {
        guestCountWrapper.classList.add('d-none');
        guestCountSelect.selectedIndex = 0;

        document
            .querySelectorAll('.partner-name-wrapper .input-group')
            .forEach(inputGroup => inputGroup.remove());
    } else {
        guestCountWrapper.classList.remove('d-none');
    }
}

function showPartnerInput(event) {
    const guestCount = event.target.value;
    const partnerNameWrapper = document.querySelector('.partner-name-wrapper');

    partnerNameWrapper.querySelectorAll('.input-group').forEach(inputGroup => inputGroup.remove());

    if (guestCount >= 2) {
        for (let i = 2; i <= guestCount; i++) {
            const div = document.createElement('div');

            div.innerHTML = `
                <div class="input-group mb-3">
                    <input name="guest${i}name" type="text"
                        class="form-control text-italic fs-16 fw-400 ff-fira-sans"
                        placeholder="Your partner's name" aria-label="Partner's Name" required>
                </div>
            `;

            partnerNameWrapper.appendChild(div.firstElementChild);
        }
    }
}

function fetchRsvpsDesktop() {
    fetch(`${baseUrl}/rsvps`)
        .then((response) => response.json())
        .then(({ rsvps }) => {
            if (!rsvps.length) {
                document.querySelector('.swiper-wishes-wrapper-lg .comments-wrapper').classList.add('d-none');
                document.querySelector('.swiper-wishes-wrapper-lg .comments-empty-placeholder').classList.remove('d-none');
                return;
            } else {
                document.querySelector('.swiper-wishes-wrapper-lg .comments-wrapper').classList.remove('d-none');
                document.querySelector('.swiper-wishes-wrapper-lg .comments-empty-placeholder').classList.add('d-none');
            }

            const commentsWrapper = document.querySelector('.swiper-wishes-wrapper-lg .comments-wrapper');

            commentsWrapper.querySelectorAll('.swiper-wishes').forEach(swiper => swiper.remove());

            const swiperGroups = rsvps.length < 10
                ? [rsvps]
                : [
                    rsvps.slice(0, Math.ceil(rsvps.length / 2)),
                    rsvps.slice(Math.ceil(rsvps.length / 2))
                ];

            const wrapper = document.createElement('div');

            wrapper.innerHTML = swiperGroups.map((rsvps, index) => `
                <div class="swiper swiper-wishes swiper-wishes-${index + 1}" style="margin-bottom: 12px;">
                    <div class="swiper-wrapper">
                        ${rsvps.map(rsvp => `
                            <div class="swiper-slide rounded-8 h-100 overflow-hidden">
                                ${generateWishCard(rsvp)}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `).join('');

            commentsWrapper.appendChild(wrapper);

            swiperGroups.forEach((_, index) => {
                const swiperElement = document.querySelector(`.swiper-wishes-${index + 1}`);
                if (swiperElement) {
                    new Swiper(swiperElement, {
                        spaceBetween: 12,
                        slidesPerView: 3,
                        loop: true,
                        freeMode: true,
                        speed: 7000 + (index * 3000),
                        autoplay: {
                            delay: 0,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: false
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 4,
                            }
                        },
                    });
                }
            });
        })
        .catch((err) => {
            console.error(err);
        });
}

function fetchRsvpsMobile(limit = 5, noIncrement = false) {
    const commentsWrapper = document.querySelector('.swiper-wishes-wrapper-sm .comments-wrapper');
    const comments = commentsWrapper.querySelectorAll('.comment-item');
    const btnLoadMore = document.querySelector('#comments button.btn-load-more');

    let count = limit;
    let remainingMessages = 0;

    if (noIncrement && comments.length <= limit) {
        count = limit;
    } else if (noIncrement) {
        count = comments.length;
    } else {
        count = comments.length + limit;
    }

    btnLoadMore.setAttribute('disabled', true);
    btnLoadMore.querySelector('.loading').classList.remove('d-none');

    fetch(`${baseUrl}/rsvps?limit=${count}`)
        .then((response) => response.json())
        .then(({ rsvps, remaining }) => {
            remainingMessages = remaining;

            if (!rsvps.length) {
                document.querySelector('.swiper-wishes-wrapper-sm .comments-wrapper').classList.add('d-none');
                document.querySelector('.swiper-wishes-wrapper-sm .comments-actions').classList.add('d-none');
                document.querySelector('.swiper-wishes-wrapper-sm .comments-empty-placeholder').classList.remove('d-none');
                return;
            } else {
                document.querySelector('.swiper-wishes-wrapper-sm .comments-wrapper').classList.remove('d-none');
                document.querySelector('.swiper-wishes-wrapper-sm .comments-actions').classList.remove('d-none');
                document.querySelector('.swiper-wishes-wrapper-sm .comments-empty-placeholder').classList.add('d-none');
            }

            comments.forEach(comment => comment.remove());

            [...rsvps].forEach((rsvp, i) => {
                const div = document.createElement('div');
                const isLastItem = (i + 1) == rsvps.length;
                div.innerHTML = generateWishCard(rsvp, true, isLastItem);
                commentsWrapper.appendChild(div.firstElementChild);
            });
        })
        .catch((err) => {
            console.error(err);
        })
        .finally(() => {
            btnLoadMore.querySelector('.loading').classList.add('d-none');
            
            if (!remainingMessages) {
                btnLoadMore.setAttribute('disabled', true);
                btnLoadMore.style.opacity = 0;
            } else {
                btnLoadMore.removeAttribute('disabled');
                btnLoadMore.style.opacity = 1;
            }
        });
}

function storeRsvp(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const btnSubmit = form.querySelector('button[type=submit]');

    validateRsvp(formData.get('invitation_id'), function () {
        btnSubmit.setAttribute('disabled', true);

        fetch(`${baseUrl}/rsvps`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrf,
            },
            body: formData,
        })
            .then((response) => response.json())
            .then(() => {
                form.reset();

                document
                    .querySelector('.guest-count-wrapper select')
                    .value = '';

                document
                    .querySelectorAll('.partner-name-wrapper .input-group')
                    .forEach(inputGroup => inputGroup.remove());

                fetchRsvpsDesktop();
                fetchRsvpsMobile(5, true);

                toastSuccess('Thank you for your confirmation and blessing!');
            })
            .catch((err) => {
                console.error(err);
            })
            .finally(() => {
                btnSubmit.removeAttribute('disabled');
            });
    });
}

function validateRsvp(invitationId, callbackFunction) {
    fetch(`${baseUrl}/rsvps/check/${invitationId}`)
        .then((response) => response.json())
        .then(({ exists }) => {
            if (exists) {
                toastWarning('You already submitted an RSVP.');
                return;
            }

            callbackFunction();
        })
        .catch((err) => {
            console.error(err);
        });
}

function generateWishCard(rsvp, isForMobile = false, isLastItem = true) {
    return `
        <div class="comment-item rounded-8 ${!isLastItem ? 'mb-3' : ''} bg-white p-4 ${!isForMobile ? 'h-100' : ''}">
            <span class="d-block fs-16 fw-500 ff-fira-sans mb-2 text-black">
                ${rsvp['full_name']}
            </span>
            <p class="text-primary-light fs-16 fw-400 ff-fira-sans m-0 mb-2 p-0">
                ${rsvp['greetings_escaped']}
            </p>
            <div class="d-flex gap-2">
                <img src="${baseUrl}/assets/images/icons/clock-primary-light.svg" alt="Clock icon">
                <span class="d-inline-block text-primary-lightest fs-13 fw-400 ff-fira-sans">
                    ${rsvp['create_date_diff']}
                </span>
            </div>
        </div>
    `;
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function playBacksound() {
    backsound.play();
    backsoundToggler.querySelector('.up').classList.remove('d-none');
    backsoundToggler.querySelector('.mute').classList.add('d-none');
}

function pauseBacksound() {
    backsound.pause();
    backsoundToggler.querySelector('.mute').classList.remove('d-none');
    backsoundToggler.querySelector('.up').classList.add('d-none');
}

function toggleBacksound() {
    if (backsound.paused) {
        playBacksound();
    } else {
        pauseBacksound();
    }
}