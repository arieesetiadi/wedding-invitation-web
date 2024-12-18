<section id="pre-footer" plain></section>

<section id="footer">
    <div class="banner">
        <img class="wave" src="{{ asset('assets/images/illustrations/wave-bottom-transparent.png') }}" alt="Wave Image">
    </div>

    <div class="main d-flex align-items-center justify-content-center">
        <div class="content">
            <span data-aos="fade-in"
                class="pre-title d-block text-uppercase ff-times-new-roman fs-24 fs-xs-20 mb-md-4 mb-3 text-center text-white">
                Thank You
            </span>

            <h1 data-aos="fade-in" data-aos-delay="500"
                class="text-uppercase ff-playfair fs-96 fs-xs-32 fw-700 mb-md-4 mb-3 text-center text-white">
                Vicky & Karina
            </h1>
        </div>
    </div>
</section>

<!-- Floating Buttons -->
<div class="floating-buttons">
    <button id="btn-scroll-to-top" onclick="scrollToTop()" role="button"
        class="btn btn-sm btn-primary rounded-5 d-flex align-items-center mb-2 p-2">
        <img width="14" height="14" src="{{ asset('assets/images/icons/arrow-top-white.svg') }}"
            alt="Arrow Top Icon">
    </button>

    <a href="#rsvp" id="btn-comment" class="btn btn-sm btn-primary rounded-5 d-flex align-items-center mb-2 p-2">
        <img width="14" height="14" src="{{ asset('assets/images/icons/message-white.svg') }}"
            alt="Message Icon">
    </a>

    <button id="btn-backsound-toggler" onclick="toggleBacksound()"
        class="btn btn-sm btn-primary rounded-5 d-flex align-items-center p-2">
        <img width="14" height="14" src="{{ asset('assets/images/icons/volume-up-line-white.svg') }}"
            alt="Volume Icon" class="up">
        <img width="14" height="14" src="{{ asset('assets/images/icons/volume-mute-line-white.svg') }}"
            alt="Mute Icon" class="mute d-none">
    </button>
</div>
