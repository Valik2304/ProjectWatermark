<section class="connect" id="contact">
    <div class="container">
        <div class="row">
            <div class="image__block col-xl-6 col-lg-6 col-md-12 col-sm-12">
{{--                <img class="left__image lazyImage" data-src="{{ url('/img/people.png') }}" alt="">--}}
            </div>
            <div class="connect__block block col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <h3 class="block__headline">{{ __('main_page.contact_us_h3') }}</h3>
                <p class="block__text">{{ __('main_page.contact_us_block_text') }}</p>
                <form class="block__form form" id="contactform" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <label for="name">
                                <input class="con_input_success con_change_border js-contact-input" id="name" name="name" type="text" placeholder="{{ __('placeholders.name') }}*" required>
                            </label>


                            <label for="phone">
                                <input class="con_input_success con_change_border js-contact-input" id="phone" name="phone" type="text" placeholder="{{ __('placeholders.phone') }}*" required>
                            </label>


                            <label for="email">
                                <input class="con_input_success con_change_border js-contact-input" id="email" name="email" type="email" placeholder="{{ __('placeholders.email') }}*" required>
                            </label>
                        </div>
                        <div class="col-xl-6">
                            <label for="subject">
                                <select id="subject" name="subject" class="connect__subject" required>
                                    <option value="" disabled selected hidden>{{ __('main_page.contact_us.type_of_message') }}</option>
                                    <option value="1">{{ __('main_page.contact_us_select.website') }}</option>
                                    <option value="2">{{ __('main_page.contact_us_select.khmelnitsky_office') }}</option>
                                    <option value="3">{{ __('main_page.contact_us_select.support') }}</option>
                                    <option value="3">{{ __('main_page.contact_us_select.quality_control') }}</option>
                                </select>
                            </label>
                            <label for="message">
                                <textarea class="con_textarea_success con_change_border js-contact-input" name="message" id="message" placeholder="{{ __('main_page.contact_us.message') }}" required></textarea>
                            </label>
                        </div>
                    </div>
                    <!-- Button trigger modal send message-->
                    <div class="button_place">
                        <button class="learn-more learn_more_btn js-button-contact-form" {{--data-toggle="modal" data-target="#send-message"--}}>
                            <div class="circle">
                                <img src="{{ url('/img/svg/right-arrow_black.svg') }}" alt="save button">
                            </div>
                            <p class="button-text">{{ __('main_page.send') }}</p>
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="send-message" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="popup__send-message modal-content">
                                <div class="send-message">
                                    <h2 class="send-message__title">{{ __('modal.mail_send') }}</h2>
                                    <p class="send-message__text">{{ __('modal.thank_for_feedback') }}</p>
                                </div>
                                <a href="#" class="send-message_form__close" data-dismiss="modal">
                                    <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                                        <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#senderror').hide();
            $('#sendmessage').hide();
            $('#contactform').on('submit', function (e) {
                e.preventDefault();
                $('.js-button-contact-form').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    url: '/sendmail',
                    data: $('#contactform').serialize(),
                    success: function (data) {
                        $('.js-button-contact-form').prop('disabled', false);
                        $('.con_input_success').removeClass('con_input_error');
                        $('.con_input_success').addClass('con_success_input');
                        $('.js-contact-input').val('');
                        $('select option[value=""]').prop('selected', true);
                        $('#send-message').modal('show');

                    },
                    error: function (data) {
                        console.log(data);
                        $('.js-button-contact-form').prop('disabled', false);
                        if(data.responseJSON.errors.name)
                        {
                            $('#name').addClass('con_input_error');
                            $('#name').removeClass('con_success_input');
                        }
                        if(data.responseJSON.errors.phone)
                        {
                            $('#phone').addClass('con_input_error');
                            $('#phone').removeClass('con_success_input');
                        }
                        if(data.responseJSON.errors.email)
                        {
                            $('#email').addClass('con_input_error');
                            $('#email').removeClass('con_success_input');
                        }
                        if(data.responseJSON.errors.message)
                        {
                            $('#message').addClass('con_input_error');
                            $('#message').removeClass('con_success_input');
                        }

                        if(
                            !data.responseJSON.errors.name
                            && !data.responseJSON.errors.name
                            && !data.responseJSON.errors.name
                            && !data.responseJSON.errors.name
                            && !data.responseJSON.errors.name
                        ){
                            alert('Сталась помилка(Error)');
                        }



                    }
                });
            });
        });
    </script>
@endpush


