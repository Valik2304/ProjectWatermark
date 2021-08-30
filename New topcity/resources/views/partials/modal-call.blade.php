<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    {{--    <link rel="stylesheet" href="css/modalstyle.css">--}}
    <link rel="stylesheet" href="/css/callbottomstyle.css">
    <link rel="stylesheet" href="/css/newstylemodal.css">
</head>
<body>

<div class="container">


    <!-- basic modal -->
    <div class="basicModal mainModal modal fade" id="basicModal" tabindex="-1" role="dialog"
         aria-labelledby="basicModal"
         aria-hidden="true">
        <div class="modal-dialog new-style">
            <form action="{{route('sendemail')}}" method="post">
                @csrf

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>

                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none; padding-top: 30px">
                        <h4 class="modal-title" id="myModalLabel" style="">Будь ласка, вкажіть Ваш номер телефону і наші
                            експерти зв’яжуться з Вами в найкоротші терміни!</h4>
                        <a href="#" data-dismiss="modal" class="login_form__close">
                            <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 enable-background="new 0 0 64 64">
                                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="modal-body modal_body" style="">
                        <label for="">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                            <input type="text" id="emailmessagephone" class="field phone" name="phone"
                                   placeholder="Введіть номер телефону">
                        </label>
                        {{--                        <p>{{$messages}}</p>--}}
                    </div>
                    <div class="modal-footer" style="">
                        <div class="button_place validateButton" data-toggle="modal">
                            <button type="submit" class="learn-more learn_more_btn btn_transparent"
                                    style="background: transparent">
                                <div class="circle">
                                    <img src="https://topsity.com.ua/img/svg/right-arrow.svg" alt="save button">
                                    <span class="icon arrow"></span>
                                </div>
                                <p class="button-text btn_basket" style="width: 200px;">Чекаю дзвінка</p>
                            </button>
                            <div id="get-zip" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                                <div role="document" class="modal-dialog modal-dialog-centered">
                                    <div class="popup__send-message modal-content">
                                        <div class="send-message">
                                            <h2 class="send-message__title">Чекаю дзвінка</h2>
                                        </div>
                                        <a href="#" data-dismiss="modal" class="send-message_form__close">
                                            <svg fill="#8f8f8f" width="13px" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 enable-background="new 0 0 64 64">
                                                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="" data-toggle="modal" data-target="#basicModal">
                <div id="__telerWdTriggerContent" class="teler-wd__trigger">
                    <div class="teler-wd__tooltip teler-wd__tooltip_right" style="display: none;">
                        Передзвонимо у зручний час
                    </div>
                    <div class="teler-wd__flipper_wrapper teler-wd__flipper_wrapper_hover">
                        <div class="teler-wd__flipper">
                            <div class="teler-wd__flipper-front">
                                <svg class="teler-wd__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"></path>
                                </svg>
                            </div>
                            <div class="teler-wd__flipper-back">КНОПКА ЗВ`ЯЗКУ</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class=" messageModal modal fade" id="messageModal" tabindex="-1" role="dialog"
         aria-labelledby="messageModal"
         aria-hidden="true">
        <div class="modal-dialog new-style" style="max-width: 440px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <h4 class="modal-title" id="myModalLabel" style="">Дякуємо за звернення!</h4>
                    <a href="#" data-dismiss="modal" class="login_form__close">
                        <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px"
                             viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink"
                             enable-background="new 0 0 64 64">
                            <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="modal-body modal_body" style="">
                    <p class="" id="" style="">Очікуйте на дзвінок нашого менеджера</p>
                </div>

            </div>
        </div>

    </div>


</div>


<script src="/js/modal-validate.js"></script>
<script src="js/modal.js"></script>

</body>
</html>
