<section id="comments" plain data-aos="fade-in">
    <div class="row h-100">
        <div
            class="left col-12 col-lg-6 bg-secondary-light {{ !$invitation ? 'd-flex align-items-center justify-content-center' : '' }} py-5">
            <div class="header mb-md-5 px-md-5 mb-5 px-4" data-aos="fade-in">
                <div class="d-flex justify-content-center mb-4">
                    <img width="100" height="70" src="{{ asset('assets/images/icons/flower.svg') }}"
                        alt="Flower Icon">
                </div>
                <h2 class="text-primary fs-40 fw-700 ff-dancing-script mb-3 text-center">
                    Wedding Wishes
                </h2>
                <span class="d-block text-primary-light ff-fira-sans fs-16 fw-400 text-center">
                    Leave us your best wishes for our happy moments
                </span>
            </div>

            @if ($invitation)
                <div class="px-md-5 px-lg-5 px-4" data-aos="fade-in">
                    <form onsubmit="updateRsvp(event)" class="w-100 px-md-5 px-lg-5 px-0">
                        <input type="hidden" name="invitation_id" value="{{ $invitation->invitation_id ?? null }}">

                        <!-- Input Full Name -->
                        <div class="input-group mb-3">
                            <input name="full_name" type="text"
                                class="form-control text-italic fs-16 fw-400 ff-fira-sans" placeholder="Name"
                                aria-label="Name" value="{{ $invitation->guest_name ?? '' }}" readonly required>
                        </div>

                        <div class="input-group mb-3">
                            <textarea name="greetings" class="form-control text-italic fs-16 fw-400 ff-fira-sans" rows="5"
                                placeholder="Give greetings and prayers" required maxlength="200"></textarea>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary w-100 justify-content-center">
                                <span class="d-inline-block fs-16 fw-500 ff-fira-sans mx-1">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <div class="right col-12 col-lg-6 bg-light">
            <div class="comments-wrapper w-100 h-100" data-aos="fade-in">
                {{-- Rsvps fetched from home.js --}}
            </div>

            <div class="comments-actions w-100 d-flex justify-content-between align-items-center pt-3 pt-lg-0">
                {{-- Prev Button --}}
                <span role="button" onclick="fetchPrevRsvps()"
                    class="d-inline-block d-flex align-items-center btn-rsvp-prev">
                    <div class="icon mb-1">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.5874 10.1676L2.7074 6.28758L6.5874 2.40758C6.77465 2.22075 6.87988 1.9671 6.87988 1.70258C6.87988 1.43806 6.77465 1.18441 6.5874 0.997578C6.1974 0.607578 5.5674 0.607578 5.1774 0.997578L0.587397 5.58758C0.197397 5.97758 0.197397 6.60758 0.587397 6.99758L5.1774 11.5876C5.5674 11.9776 6.1974 11.9776 6.5874 11.5876C6.9674 11.1976 6.9774 10.5576 6.5874 10.1676Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <span class="d-inline-block px-3">Prev</span>
                </span>

                {{-- Next Button --}}
                <span role="button" onclick="fetchNextRsvps()"
                    class="d-inline-block d-flex align-items-center btn-rsvp-next">
                    <span class="d-inline-block px-3">Next</span>
                    <div class="icon mb-1">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.587407 10.1676L4.46741 6.28758L0.587407 2.40758C0.400155 2.22075 0.294922 1.9671 0.294922 1.70258C0.294922 1.43806 0.400155 1.18441 0.587407 0.997578C0.977407 0.607578 1.60741 0.607578 1.99741 0.997578L6.58741 5.58758C6.97741 5.97758 6.97741 6.60758 6.58741 6.99758L1.99741 11.5876C1.60741 11.9776 0.977407 11.9776 0.587407 11.5876C0.207407 11.1976 0.197407 10.5576 0.587407 10.1676Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                </span>
            </div>

            <div class="d-none comments-empty-placeholder w-100">
                <span class="d-block text-center text-primary ff-fira-sans fs-16 fw-400">
                    No messages have been submitted yet
                </span>
            </div>
        </div>
    </div>
</section>
