<div class="gift-banner">
    <div class="py-lg-4 container px-5 py-5">
        <div class="row">
            <div class="col-12 col-lg-9 d-block d-lg-flex align-items-center px-2">
                <div class="d-flex justify-content-center mb-lg-0 mb-5">
                    <img width="80" height="80" src="{{ asset('assets/images/icons/gift-secondary.svg') }}"
                        alt="Gift icon">
                </div>

                <div class="text-primary px-lg-5 mb-lg-0 mb-5 px-0">
                    <h3 class="fs-32 fw-700 ff-dancing-script mb-lg-2 text-lg-start mb-3 text-center">
                        Wedding Gift
                    </h3>
                    <p class="fs-16 fw-400 ff-fira-sans text-lg-start text-center">
                        Your blessing is a very meaningful gift for us. However, if giving is an expression of your
                        love,
                        you can give cashless gifts.
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-3 d-flex align-items-center justify-content-end">
                <button type="button" class="btn btn-secondary w-100 justify-content-center px-5"
                    data-bs-toggle="modal" data-bs-target="#gift-modal">
                    <span class="d-inline-block fs-16 fw-500 ff-fira-sans text-normal mx-1 text-center">Send Gift</span>
                </button>
            </div>
        </div>
    </div>
</div>

@pushOnce('before-scripts')
    {{-- Gift Modal --}}
    <div class="modal fade" id="gift-modal" tabindex="-1" aria-labelledby="gift-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4 px-lg-5 py-4">
                    <h5 class="modal-title text-primary fs-32 fw-700 ff-dancing-script" id="gift-modal-label">
                        Account Number
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="gift" class="modal-body px-4 pt-3 pb-4 px-lg-5 pt-lg-4 pb-lg-5">
                    <div class="bank-wrapper">
                        <div class="bank-item rounded-16 mb-4 mb-lg-0 bg-white">
                            <div class="header mb-1">
                                <span class="d-inline-block fs-20 fw-600 ff-inter text-black">
                                    Diana Veronica
                                </span>
                                <img width="77" height="24" src="{{ asset('assets/images/icons/bank-bca.png') }}"
                                    alt="BCA Icon" class="mb-lg-0 mb-4">
                            </div>
                            <div class="main">
                                <div class="w-100">
                                    <span id="account-number-bca" class="d-block fs-32 fw-400 ff-nova-mono mb-3 text-black">
                                        5450193048
                                    </span>
                                    <div class="actions">
                                        <button onclick="copyToClipboard(event, '#account-number-bca')"
                                            class="btn btn-sm btn-white btn-pill d-block text-primary-light text-center w-100">
                                            <img class="d-inline-block pointer-events-none mx-1 mb-1" width="18"
                                                height="18" src="{{ asset('assets/images/icons/copy.svg') }}"
                                                alt="Copy icon">
                                            <span
                                                class="d-inline-block fs-13 ff-inter text-normal pointer-events-none mx-1">
                                                Copy account number
                                            </span>
                                        </button>
                                        <button
                                            class="d-none d-md-block btn btn-sm btn-copied btn-secondary btn-pill d-block pointer-events-none hidden text-center text-white">
                                            <span class="d-inline-block fs-13 ff-inter text-normal mx-1">Copied!</span>
                                        </button>
                                    </div>
                                </div>

                                <img width="40" height="40" src="{{ asset('assets/images/icons/bank-dots.svg') }}"
                                    class="dots" alt="Dots icon">
                            </div>
                        </div>

                        <div class="bank-item rounded-16 bg-white">
                            <div class="header mb-1">
                                <span class="d-inline-block fs-20 fw-600 ff-inter text-black">
                                    Billy Gani
                                </span>
                                <img width="77" height="24" src="{{ asset('assets/images/icons/bank-bca.png') }}"
                                    alt="BCA Icon" class="mb-lg-0 mb-4">
                            </div>
                            <div class="main">
                                <div class="w-100">
                                    <span id="account-number-bca2"
                                        class="d-block fs-32 fw-400 ff-nova-mono mb-3 text-black">
                                        6040670597
                                    </span>
                                    <div class="actions">
                                        <button onclick="copyToClipboard(event, '#account-number-bca2')"
                                            class="btn btn-sm btn-white btn-pill d-block text-primary-light text-center w-100">
                                            <img class="d-inline-block pointer-events-none mx-1 mb-1" width="18"
                                                height="18" src="{{ asset('assets/images/icons/copy.svg') }}"
                                                alt="Copy icon">
                                            <span
                                                class="d-inline-block fs-13 ff-inter text-normal pointer-events-none mx-1">
                                                Copy account number
                                            </span>
                                        </button>
                                        <button
                                            class="d-none d-md-block btn btn-sm btn-copied btn-secondary btn-pill d-block pointer-events-none hidden text-center text-white">
                                            <span class="d-inline-block fs-13 ff-inter text-normal mx-1">Copied!</span>
                                        </button>
                                    </div>
                                </div>

                                <img width="40" height="40" src="{{ asset('assets/images/icons/bank-dots.svg') }}"
                                    class="dots" alt="Dots icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endPushOnce
