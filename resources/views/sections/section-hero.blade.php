<section id="hero">
    <div class="h-screen wrapper">
        <div class="row h-100">
            <div class="col-md-5 h-100 px-0 left">
                <div class="content">
                    <div class="text-white">
                        <h2 class="text-center fs-15 ff-fira-sans mb-3 text-uppercase">The Wedding of</h2>
                        <h1 class="text-center fs-64 ff-italianno mb-3">Billy & &nbsp;Diana</h1>
                        <h3 class="text-center fs-20 ff-fira-sans">15 ∙ 02 ∙ 2025</h3>
                    </div>
                </div>

                <div class="cta">
                    <div class="text-white">
                        <span class="d-block text-center fs-14 fw-400 ff-fira-sans">
                            Dear, <br><strong class="fs-16">
                                {{ $invitation->guest_name ?? 'Guest' }}
                            </strong>
                        </sp>
                        <button onclick="openInvitation()" class="btn btn-secondary btn-pill btn-invitation d-block text-center text-white mt-4">
                            <img class="d-inline-block mx-1 mb-1" width="15" height="15" src="{{ asset('assets/images/icons/mail-open-white.svg') }}" alt="Mail icon">
                            <span class="d-inline-block mx-1 fs-16 text-normal ff-fira-sans">Open Invitation</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-7 h-100 px-0 right"></div>
        </div>

        <div class="scroll-info">
            <span class="d-block text-center text-white fs-20 fw-500 ff-fira-sans mb-2">
                Scroll for more
            </span>

            <div class="d-flex justify-content-center align-items-center">
                <img width="14" height="14" src="{{ asset('assets/images/icons/arrow-down-white.svg') }}" alt="Arrow icon">
            </div>
        </div>
    </div>
</section>
