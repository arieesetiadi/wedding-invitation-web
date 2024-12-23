<section id="gift" class="bg-primary text-white" data-aos="fade-in">
    <div class="header mb-lg-5 mb-5">
        <h2 class="fs-40 fw-700 ff-dancing-script px-lg-0 mb-4 px-5 text-center">
            Wedding Gift
        </h2>
        <span class="sub-title d-block fs-16 fw-400 ff-fira-sans text-center">
            Your blessing is a very meaningful gift for us. However, if giving is an expression of your love, you can
            give cashless gifts.
        </span>
    </div>

    <div class="container">
        <div class="bank-wrapper">
            <div class="bank-item rounded-16 mb-5 bg-white">
                <div class="header mb-3">
                    <span class="d-inline-block fs-20 fw-600 ff-inter text-black">
                        Diana Veronica
                    </span>
                    <img width="77" height="24" src="{{ asset('assets/images/icons/bank-bca.png') }}"
                        alt="BCA Icon" class="mb-lg-0 mb-3">
                </div>
                <div class="main">
                    <div>
                        <span id="account-number-bca" class="d-block fs-32 fw-400 ff-nova-mono mb-3 text-black">
                            60855685555
                        </span>
                        <div class="actions">
                            <button onclick="copyToClipboard(event, '#account-number-bca')" class="btn btn-sm btn-white btn-pill d-block text-primary-light text-center">
                                <img class="d-inline-block pointer-events-none mx-1 mb-1" width="18" height="18"
                                    src="{{ asset('assets/images/icons/copy.svg') }}" alt="Copy icon">
                                <span class="d-inline-block pointer-events-none fs-13 ff-inter text-normal mx-1">Copy account number</span>
                            </button>
                            <button
                                class="btn btn-sm btn-copied btn-secondary hidden btn-pill d-block pointer-events-none text-center text-white">
                                <span class="d-inline-block fs-13 ff-inter text-normal mx-1">Copied!</span>
                            </button>
                        </div>
                    </div>

                    <img width="60" height="60" src="{{ asset('assets/images/icons/bank-dots.svg') }}"
                        class="dots" alt="Dots icon">
                </div>
            </div>

            <div class="bank-item rounded-16 bg-white">
                <div class="header mb-3">
                    <span class="d-inline-block fs-20 fw-600 ff-inter text-black">
                        Billy Gani
                    </span>
                    <img width="150" height="24" src="{{ asset('assets/images/icons/bank-cimb-niaga.png') }}"
                        alt="BCA Icon" class="mb-lg-0 mb-3">
                </div>
                <div class="main">
                    <div>
                        <span id="account-number-cimb" class="d-block fs-32 fw-400 ff-nova-mono mb-3 text-black">
                            705005654893
                        </span>
                        <div class="actions">
                            <button onclick="copyToClipboard(event, '#account-number-cimb')" class="btn btn-sm btn-white btn-pill d-block text-primary-light text-center">
                                <img class="d-inline-block pointer-events-none mx-1 mb-1" width="18" height="18"
                                    src="{{ asset('assets/images/icons/copy.svg') }}" alt="Copy icon">
                                <span class="d-inline-block pointer-events-none fs-13 ff-inter text-normal mx-1">Copy account number</span>
                            </button>
                            <button
                                class="btn btn-sm btn-copied btn-secondary hidden btn-pill d-block pointer-events-none text-center text-white">
                                <span class="d-inline-block fs-13 ff-inter text-normal mx-1">Copied!</span>
                            </button>
                        </div>
                    </div>

                    <img width="60" height="60" src="{{ asset('assets/images/icons/bank-dots.svg') }}"
                        class="dots" alt="Dots icon">
                </div>
            </div>
        </div>
    </div>
</section>
