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
            {{-- <div class="w-100">
                <button onclick="fetchPrevRsvps()" class="btn btn-dark btn-rsvp-prev">
                    Prev
                </button>
                <button onclick="fetchNextRsvps()" class="btn btn-dark btn-rsvp-next">
                    Next
                </button>
            </div> --}}

            <div class="comments-wrapper w-100 h-100" data-aos="fade-in">
                {{-- Rsvps fetched from home.js --}}
            </div>
        </div>
    </div>
</section>
