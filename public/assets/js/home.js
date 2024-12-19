const backsound = new Audio('assets/audios/backsound.mp3');
const backsoundToggler = document.querySelector('#btn-backsound-toggler');
const loading = document.querySelector('#loading');
const floatingButtons = document.querySelector('.floating-buttons');

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

    setCountdown();
    setInterval(() => {
        setCountdown();
    }, 1000 * 60 * 60);

    fetchRsvps();
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

    main.classList.remove('d-none');
    main.classList.remove('openned');
    onboarding.classList.add('closed');

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

function copyToClipboard(selector) {
    const text = document.querySelector(selector);
    const textarea = document.createElement("textarea");

    textarea.value = text.innerText;

    document.body.appendChild(textarea);

    textarea.select();
    textarea.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(textarea.value).then(function () {
        toastSuccess('Copied!');
    }, function (err) {
        console.error(err);
    });

    document.body.removeChild(textarea);
}

function toggleBacksound() {
    if (backsound.paused) {
        playBacksound();
    } else {
        pauseBacksound();
    }
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

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
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
                    <input name="guest${i}name" type="text" class="form-control"
                        placeholder="Your partner's name" aria-label="Partner's Name" required>
                </div>
            `;

            partnerNameWrapper.appendChild(div.firstElementChild);
        }
    }
}

function fetchRsvps(limit = 5, noIncrement = false) {
    const commentsWrapper = document.querySelector('.comments-wrapper');
    const comments = commentsWrapper.querySelectorAll('.comment-item');

    let count = limit;

    if (noIncrement && comments.length <= limit) {
        count = limit;
    } else if (noIncrement) {
        count = comments.length;
    } else {
        count = comments.length + limit;
    }

    fetch(`${baseUrl}/rsvps/${count}`)
        .then((response) => response.json())
        .then(({ rsvps }) => {
            comments.forEach(comment => comment.remove());

            [...rsvps].forEach((rsvp) => {
                const div = document.createElement('div');

                div.innerHTML = `
                    <div class="comment-item col-12 border-bottom border-danger py-3">
                        <div class="d-flex align-items-center mb-2 gap-3">
                            <span class="text-primary text-uppercase fs-16 fw-700 ff-times-new-roman">
                                ${rsvp['full_name']}
                            </span>

                            <div class="bg-secondary d-flex rounded-pill align-items-center gap-1 px-2 py-1">
                                <img width="14" height="14"src="${baseUrl}/assets/images/icons/${!!rsvp['attendance'] ? 'check-primary.svg' : 'times-primary.svg'}">
                                <span class="fs-14 fs-xs-12 text-primary ff-times-new-roman">
                                    ${!!rsvp['attendance'] ? 'Will Attend' : 'Will Not Attend'} 
                                </span>
                            </div>
                        </div>

                        <p class="text-primary-dark fs-16 fw-400 ff-times-new-roman mb-2">
                            ${rsvp['greetings_escaped']}
                        </p>

                        <div class="d-flex gap-2">
                            <img src="${baseUrl}/assets/images/icons/clock-primary-dark.svg" alt="Clock Icon">

                            <span class="fs-14 fs-xs-12 text-primary-dark ff-times-new-roman">
                                ${rsvp['create_date_diff']}
                            </span>
                        </div>
                    </div>
                `;

                commentsWrapper.appendChild(div.firstElementChild);
            });
        })
        .catch((err) => {
            console.error(err);
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
                    .querySelectorAll('.partner-name-wrapper .input-group')
                    .forEach(inputGroup => inputGroup.remove());

                fetchRsvps(5, true);

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