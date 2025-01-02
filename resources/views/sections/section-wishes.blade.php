<section id="comments" class="text-white {{ !$invitation ? 'bg-y-flip' : '' }}" plain>
    <div class="header mb-lg-5 mb-5" data-aos="fade-in">
        <h2 class="fs-40 fw-700 ff-dancing-script px-lg-0 px-5 text-center">
            Wedding Wishes
        </h2>
        <span class="sub-title d-block fs-16 fw-400 ff-fira-sans text-center">
            Leave us your best wishes for our happy moments
        </span>
    </div>

    <div class="swiper-wishes-wrapper-lg">
        <div class="comments-wrapper w-100 h-100" data-aos="fade-in">
            {{-- Rsvps fetched from home.js --}}
        </div>

        <div class="d-none comments-empty-placeholder w-100">
            <span class="d-block text-center text-primary ff-fira-sans fs-16 fw-400">
                No messages have been submitted yet
            </span>
        </div>
    </div>

    <div class="swiper-wishes-wrapper-sm">
        <div class="comments-wrapper w-100 h-100" data-aos="fade-in">
            {{-- Rsvps fetched from home.js --}}
        </div>

        <div class="comments-actions w-100 d-flex justify-content-center align-items-center pt-lg-0 pt-3">
            {{-- Load More Button --}}
            <button onclick="fetchRsvpsMobile()" class="btn btn-load-more btn-secondary transition-all">
                <span class="d-inline-block mx-1 fs-16 fw-500 text-normal ff-fira-sans">
                    Load More
                </span>
            </button>
        </div>

        <div class="d-none comments-empty-placeholder w-100">
            <span class="d-block text-center text-white ff-fira-sans fs-16 fw-400">
                No messages have been submitted yet
            </span>
        </div>
    </div>
</section>
