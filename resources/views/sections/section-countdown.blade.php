<section id="countdown" class="bg-light">
    <div class="header mb-5">
        <h2 class="text-primary fs-40 fw-700 ff-dancing-script px-lg-0 px-5 text-center">
            You're Invited
        </h2>
    </div>

    <div class="content container">
        <div class="d-flex justify-content-center mb-3">
            <img width="18" height="18" src="{{ asset('assets/images/icons/calendar-black.svg') }}"
                alt="Calendar icon">
        </div>

        <span class="d-block text-uppercase fs-18 fw-500 ff-fira-sans mb-2 text-center text-black">
            Saturday
        </span>

        <span class="d-block fs-32 fw-400 ff-fira-sans mb-5 text-center text-black">
            15 February 2025
        </span>

        <div class="d-flex justify-content-center">
            <div class="timer-days d-flex align-items-center justify-content-center bg-primary rounded-40">
                <div class="text-white">
                    <span class="d-block fs-36 ff-fira-code number mb-1 text-center">
                        {{-- Generated from script --}}
                    </span>
                    <span class="d-block fs-15 ff-fira-sans text-center">Days</span>
                </div>
            </div>
        </div>
    </div>
</section>
