<section id="comments" plain data-aos="fade-in">
    <div class="row h-100">
        <div class="left col-12 col-lg-6 bg-secondary-light py-5">
            <div class="header mb-md-5 px-md-5 mb-5 px-4">
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

            <div class="px-md-5 px-lg-5 px-4">
                <form class="w-100 px-md-5 px-lg-5 px-0">
                    <input type="hidden" name="invitation_id" value="">

                    <!-- Input Full Name -->
                    <div class="input-group mb-3">
                        <input name="full_name" type="text"
                            class="form-control text-italic fs-16 fw-400 ff-fira-sans" placeholder="Name"
                            aria-label="Name" value="" required>
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
        </div>

        <div class="right col-12 col-lg-6 bg-light">
            <div class="comments-wrapper w-100 h-100">
                @foreach (range(1, 15) as $i)
                    <div class="comment-item rounded-8 bg-white p-4 {{ !$loop->last ? 'mb-3' : '' }}">
                        <span class="d-block fs-16 fw-500 ff-fira-sans mb-2 text-black">
                            Sender 1 Name
                        </span>
                        <p class="text-primary-light fs-16 fw-400 ff-fira-sans m-0 mb-2 p-0">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda quis perspiciatis
                            maiores magnam
                            dicta? Vero dicta doloribus odio maxime. Sequi omnis, nostrum natus voluptas voluptate
                            ducimus corporis
                            temporibus praesentium aliquid!
                        </p>
                        <div class="d-flex gap-2">
                            <img src="{{ asset('assets/images/icons/clock-primary-light.svg') }}" alt="Clock icon">
                            <span class="d-inline-block text-primary-lightest fs-13 fw-400 ff-fira-sans">
                                1 day ago
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
