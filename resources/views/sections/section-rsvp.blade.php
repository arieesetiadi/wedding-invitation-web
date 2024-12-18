@if ($invitation)
    <section id="rsvp">
        <div class="header mb-md-5 px-md-5 mb-5 px-4" data-aos="fade-in">
            <div class="d-flex justify-content-center mb-1">
                <img width="40" height="40" src="{{ asset('assets/images/icons/feather.png') }}" alt="Feather Icon">
            </div>

            <h2 class="text-primary fs-48 fs-xs-32 fw-400 ff-italiana mb-3 text-center">
                RSVP
            </h2>

            <span class="d-block text-primary-dark ff-times-new-roman fs-20 text-center">
                Please RSVP to confirm your attendance at our special day
            </span>
        </div>
        <div class="content container-sm px-md-5 px-4">
            <div class="row" data-aos="fade-in">
                <div class="col-12 col-md-6 offset-md-3 mb-md-0 mb-4">
                    <form onsubmit="storeRsvp(event)" class="w-100">
                        <input type="hidden" name="invitation_id" value="{{ $invitation->invitation_id ?? null }}">

                        <!-- Input Full Name -->
                        <div class="input-group mb-3">
                            <input name="full_name" type="text" class="form-control" placeholder="Enter full name"
                                aria-label="Full name" value="{{ $invitation->guest_name ?? '' }}" required>
                        </div>

                        <!-- Input Phone -->
                        <div class="input-group mb-3">
                            <input name="phone" type="tel" class="form-control" placeholder="Phone"
                                aria-label="Phone number" required>
                        </div>

                        <!-- Input Confirmation -->
                        <div class="input-group mb-3">
                            <select onchange="toggleGuestCount(event)" name="attendance" class="form-select"
                                aria-label="Confirm of Attendance" required>
                                <option selected value="">Confirm of Attendance</option>
                                <option value="1">Will Attend</option>
                                <option value="0">Cannot Attend</option>
                            </select>
                        </div>

                        <!-- Input Guest Count -->
                        <div class="guest-count-wrapper input-group mb-3">
                            <select onchange="showPartnerInput(event)" name="num_guest" class="form-select"
                                aria-label="Number Of Guest">
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
                        <div class="partner-name-wrapper">
                            @if ($invitation && $invitation->num_guest ?? 0 >= 2)
                                @for ($i = 2; $i <= $invitation->num_guest; $i++)
                                    <div class="input-group mb-3">
                                        <input name="guest{{ $i }}name" type="text" class="form-control"
                                            placeholder="Your partner's name" aria-label="Partner's Name" required>
                                    </div>
                                @endfor
                            @endif
                        </div>

                        <!-- Input Greetings -->
                        <div class="input-group mb-3">
                            <textarea name="greetings" class="form-control" rows="5" placeholder="Give greetings and prayers" required
                                maxlength="200"></textarea>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="text-uppercase fs-14 ff-times-new-roman text-center">
                                    Submit
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif
