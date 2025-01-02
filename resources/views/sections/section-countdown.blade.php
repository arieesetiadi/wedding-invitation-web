<section id="countdown" class="bg-light">
    <div class="wrapper" data-aos="fade-in">
        <div>
            <div class="header mb-4">
                <h2 class="text-primary fs-40 fw-700 ff-dancing-script px-lg-0 px-5 text-center">
                    You're Invited
                </h2>
            </div>

            <div class="content container">
                <span class="d-block fs-24 fw-400 mb-4 text-center text-black">
                    <span class="text-uppercase">Saturday, February 15</span><sup>th</sup> 2025
                </span>

                <div class="d-flex justify-content-center pt-2">
                    <div class="{{ $isHappening || $isPassed ? 'message' : '' }} timer-days d-flex align-items-center justify-content-center bg-secondary rounded-16">
                        <div class="text-white">
                            @if ($isHappening)
                                <span class="d-block fs-36 ff-fira-code number mb-1 text-center">
                                    It's happening TODAY! @6PM
                                </span>
                            @elseif ($isPassed)
                                <span class="d-block fs-36 ff-fira-code number mb-1 text-center">
                                    Thanks for the love & wishes!
                                </span>
                            @else
                                <span class="d-block fs-36 ff-fira-code number mb-1 text-center">
                                    {{ $countdown }}
                                </span>
                                <span class="d-block fs-15 ff-fira-sans text-center">Days</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
