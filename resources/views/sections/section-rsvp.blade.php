@if ($invitation)
    <section id="rsvp" plain>
        <div class="row">
            <div class="col-12 col-lg-6 bg-secondary-light py-5">
                <div class="header mb-md-5 px-md-5 mb-5 px-4" data-aos="fade-in">
                    <div class="d-flex justify-content-center mb-4">
                        <img width="100" height="70" src="{{ asset('assets/images/icons/flower.svg') }}"
                            alt="Flower Icon">
                    </div>
                    <h2 class="text-primary fs-40 fw-700 ff-dancing-script mb-3 text-center">
                        RSVP
                    </h2>
                    <span class="d-block text-primary-light ff-fira-sans fs-16 fw-400 text-center">
                        Kindly RSVP by <strong>January 31, 2025</strong>, to confirm your attendance on our special day
                    </span>
                </div>

                <div class="px-md-5 px-lg-5 px-4">
                    <form onsubmit="storeRsvp(event)" class="w-100 px-md-5 px-lg-5 px-0" data-aos="fade-in">
                        <input type="hidden" name="invitation_id" value="{{ $invitation->invitation_id ?? null }}">

                        <!-- Input Full Name -->
                        <div class="input-group mb-3">
                            <input name="full_name" type="text"
                                class="form-control text-italic fs-16 fw-400 ff-fira-sans" placeholder="Enter full name"
                                aria-label="Full name" value="{{ $invitation->guest_name ?? '' }}" readonly required>
                        </div>

                        <!-- Input Phone -->
                        <div class="input-group mb-3">
                            <input name="phone" type="tel"
                                class="form-control text-italic fs-16 fw-400 ff-fira-sans" placeholder="Phone"
                                aria-label="Phone number" required>
                        </div>

                        <!-- Input Confirmation -->
                        <div class="input-group mb-3">
                            <select onchange="toggleGuestCount(event)" name="attendance"
                                class="form-select text-italic fs-16 fw-400 ff-fira-sans"
                                aria-label="Confirm of Attendance" required>
                                <option selected value="">Confirm of Attendance</option>
                                <option value="1">Will Attend</option>
                                <option value="0">Cannot Attend</option>
                            </select>
                        </div>

                        <!-- Input Guest Count -->
                        <div class="guest-count-wrapper input-group mb-3">
                            <select onchange="showPartnerInput(event)" name="num_guest"
                                class="form-select text-italic fs-16 fw-400 ff-fira-sans" aria-label="Number Of Guest">
                                <option selected value="">Number Of Guest</option>
                                
                                @foreach (range(1, 5) as $i)
                                    @if ($invitation->num_guest >= $i)
                                        <option value="{{ $i }}" @selected(isset($invitation) && $invitation->num_guest == $i)>
                                            {{ $i }} PAX
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Partner's Name -->
                        <div class="partner-name-wrapper mb-3">
                            @if ($invitation && $invitation->num_guest ?? 0 >= 2)
                                @for ($i = 2; $i <= $invitation->num_guest; $i++)
                                    <div class="input-group mb-3">
                                        <input name="guest{{ $i }}name" type="text"
                                            class="form-control text-italic fs-16 fw-400 ff-fira-sans"
                                            placeholder="Your partner's name" aria-label="Partner's Name" required>
                                    </div>
                                @endfor
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <textarea name="greetings" class="form-control text-italic fs-16 fw-400 ff-fira-sans" rows="5"
                                placeholder="Give greetings and prayers" required maxlength="200"></textarea>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary">
                                <span class="d-inline-block fs-16 fw-500 ff-fira-sans mx-1">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6 banner"></div>
        </div>
    </section>
@endif
