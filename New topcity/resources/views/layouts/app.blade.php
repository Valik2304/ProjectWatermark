<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{ 'https://www.googletagmanager.com/gtag/js?id=' . setting('site.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
    </script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NZHKFGR');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta id="base_url" name="base-url" content="{{ route('landing-page') }}">
    <meta id="url" name="url" content="{{ url('/') }}">

    <title>{{ __('general.seo.title')  }} | @yield('title', '') </title>

    <meta name="description" content=" @yield('description', __('general.seo.description'))">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap&subset=cyrillic"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('img/favicons.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
{{--    <link rel="stylesheet" href="css/callbottomstyle.css">--}}
    @yield('css')

</head>
<body itemscope itemtype="{{ route('landing-page') }}">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZHKFGR"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


@include('partials.header')

@yield('content')

@include('partials.modal-call')

@include('partials.footer')

<!-- Scripts -->
{{--<script src="js/modal-validate.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>
<script src="{{ asset(mix('js/app.js')) }}"></script>
<script>

    $("#reset_button").click(function (event) {
        event.preventDefault();
        $('#exampleModalCenter').modal('hide');
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            type: 'POST',
            url: '{{ route('reset.password') }}',
            data: $("#reset_form").serialize(),
            success: function (data) {
                console.log(data);
                console.log(data['success']);


            },
            error: function (data) {
                alert('ERROR');
                console.log(data);


            }
        });
    });


    $("#login_button").click(function (event) {
        $("#email_error").empty();
        $("#password_error").empty();
        event.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            type: 'POST',
            url: '{{ route('login') }}',
            data: $("#login_form").serialize(),
            success: function (data) {
                console.log(data);
                console.log(data['success']);


                if (data['success']) {
                    window.location.replace(data['previous_url']);
                } else {
                    alert('ОШИБКА');
                }

            },
            error: function (data) {
                console.log(data);
                console.log(data.responseJSON.errors);
                if (data.responseJSON.errors) {
                    $("#email_error").html(data.responseJSON.errors.email);
                    $("#password_error").html(data.responseJSON.errors.password);
                }

                if (data.responseJSON.errors.email) {
                    $("#emailInput_error").html(data.responseJSON.errors.email).addClass('error_input');
                } else {
                    $("#emailInput_error").html(data.responseJSON.errors.email).removeClass('error_input');

                }
                if (data.responseJSON.errors.password) {
                    $("#passwordInput_error").html(data.responseJSON.errors.password).addClass('error_input');
                } else {
                    $("#passwordInput_error").html(data.responseJSON.errors.password).removeClass('error_input');

                }

            }
        });
    });
    $("#register_button").click(function (event) {
        event.preventDefault();
        $("#reg_name_err").empty();
        $("#reg_email_err").empty();
        $("#reg_password_err").empty();
        $('#reg_nameInput_err').empty();
        $('#reg_emailInput_err').empty();
        $('#reg_passwordInput_err').empty();
        console.log("hello");
        $.ajax({
            type: 'POST',
            url: '{{ route('register') }}',
            data: $("#register_form").serialize(),
            success: function (data) {
                if (data['success']) {
                    $('.form-popup__registration').css({"display": "none"});
                    $('.register-complete').css({"display": "block"});
                    window.location.href = '{{ route('users.edit') }}';
                } else {
                    alert('ОШИБКА');
                }
            },

            error: function (data) {
                if (data.responseJSON.errors) {
                    $("#reg_name_err").html(data.responseJSON.errors.name);
                    $("#reg_email_err").html(data.responseJSON.errors.email);
                    $("#reg_password_err").html(data.responseJSON.errors.password);
                }
                if (data.responseJSON.errors.name) {
                    $("#reg_nameInput_err").html(data.responseJSON.errors.name).addClass('error_input');
                } else {
                    $("#reg_nameInput_err").html(data.responseJSON.errors.name).removeClass('error_input');
                }
                if (data.responseJSON.errors.password) {
                    $("#reg_passwordInput_err").html(data.responseJSON.errors.password).addClass('error_input');
                } else {
                    $("#reg_passwordInput_err").html(data.responseJSON.errors.password).removeClass('error_input');
                }
                if (data.responseJSON.errors.email) {
                    $("#reg_emailInput_err").html(data.responseJSON.errors.email).addClass('error_input');
                } else {
                    $("#reg_emailInput_err").html(data.responseJSON.errors.email).removeClass('error_input');
                }


            }
        });
    });

    $(document).on("click", ".js-gear-cart-button", function (e) {
        let arrInput = [];
        let bla = $('.modal-content__input');
        console.log(bla);
        $('.modal-content__input').each(function (index) {
            if ($(this).val() == '') {
                $(this).css('box-shadow', '0px 0px 3px 1px #f50057');
                arrInput.push($(this));
            } else {
                $(this).css('box-shadow', 'none');
            }
        });
        console.log(arrInput);
        if (arrInput.length == 0) {
            console.log('error');
            $('.order-numb__modal').modal('hide');

            let category_id = $('.js-gear-category').val();
            let article = $('.js-gear-article').val();
            let arr = [];
            $('.modal-content__result').children().each(function (index) {
                arr.push($(this).val())
            });
            arr.splice(-2, 2);
            tex = article.split('');
            let l = tex.length;
            let arrL = 0;
            for (let i = 0; i <= l; i++) {
                if (tex[i] == '.') {
                    tex[i] = arr[arrL++];
                }
            }
            let article_new = tex.join('');
            let url = '{{ route('cart.store') }}';
            let type = 'cart';
            if ($(this).hasClass('js-gear-add-to-zip')) {
                $(this).removeClass('js-gear-add-to-zip');
                url = '{{ route('zip.store') }}';
                type = 'zip';
            }
            let data = {
                article: article,
                article_new: article_new,
                category_id: category_id,
                "_token": "{{ csrf_token() }}"
            };

            VueApp.$refs.cart.addToCart(data, url, type);

        }


    });


    //Add to ZIP AUTO

    $('.js-add-to-zip').click(function (e) {
        e.preventDefault();
        let article = $(e.target).closest('.js-product-block').find(".js-product-reference").text();
        let category_id = $(e.target).closest('.js-product-block').find(".js-product-category").val();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{ route('zip.store') }}',
            dataTyoe: 'json',
            data: {article: article, category_id: category_id},
            success: function (data) {
                console.log(data);
                console.log('ADD TO ZIP AUTO');
                // alert('ADD TO ZIP AUTO');
                $('#modal_zip').modal('show');
            },
            error: function (data) {
                alert(data);
                console.log(data);
                console.log('ADD TO ZIP AUTO ERROR');
            }
        });

    });

    //end Add to ZIP AUTO


    //add to cart AUTO

    $('.js-buy-button').click(function (e) {
        e.preventDefault();
        let article = $(e.target).closest('.js-product-block').find(".js-product-reference").text();
        let category_id = $(e.target).closest('.js-product-block').find(".js-product-category").val();
        console.log(article);
        console.log(category_id);
        let url = '{{ route('cart.store') }}';

        let data = {article: article, category_id: category_id};


        VueApp.$refs.cart.addToCart(data, url, 'cart');
    });

    $('#phone').mask("+38(999) 999-9999");

    //end add t

</script>
@stack('scripts')


</body>
</html>
