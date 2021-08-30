@foreach($products as $product)
    <div class="basket__item item row">
        <div class="col-1">
            <img class="item__image lazyImage" data-src="{{ url('/img/product-card.png') }}" alt="">
        </div>
        <div class="col-3">
            <p class="item__dis bold">{{ $product->name }}</p>
            <p class="item__dis">{{ $product->category }}</p>
        </div>
        <div class="item__num col-3">{{ $product->article_new }}</div>
        <div class="item__summ col-2">
            <button class="summ--minus">
                <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
            </button>
            <input class="summ--input" type="text" name="" id="" value="{{ $product->qty }}">
            <button class="summ--plus">
                <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
            </button>
        </div>
        <div class="item__base-price col-1">
            <span class="bold">{{ $product->price }}</span> <span class="bold">грн.</span>
        </div>
        <div class="item__final-price col-1">
            <span class="bold">{{ $product->subtotal }}</span> <span class="bold">грн.</span>
        </div>
        <button class="item__delete" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #8f8f8f;
                            fill-rule: evenodd;
                        }
                    </style>
                </defs>
                <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
            </svg>
        </button>
    </div>
       {{-- <form id="form_1" action="{{ route('cart.destroy', $row->rowId) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="item__delete" type="button">X</button>
        </form>--}}


@endforeach
{{--
<div class="basket__item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>
<div class="basket__item js-basket-item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>
<div class="basket__item js-basket-item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>
<div class="basket__item js-basket-item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>
<div class="basket__item js-basket-item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>
<div class="basket__item js-basket-item item row">
    <div class="col-1">
        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
    </div>
    <div class="col-3">
        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
        <p class="item__dis">изковльтная комутационная техника</p>
    </div>
    <div class="item__num col-3">3RA1316-8XB30-1AP0</div>
    <div class="item__summ col-2">
        <button class="summ--minus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 400 400" xml:space="preserve">
                                                <g>
                                                    <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                        C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                        c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                                    />
                                                    <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                        c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                                </g>
                                            </svg>
        </button>
        <input class="summ--input" type="text" name="" id="">
        <button class="summ--plus">
            <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 612 612" xml:space="preserve">
                                                <g>
                                                    <g id="_x38__3_">
                                                        <g>
                                                            <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                                C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                                C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                                c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                                h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                                c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
        </button>
    </div>
    <div class="item__base-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <div class="item__final-price col-1">
        <span class="bold">270</span> <span class="bold">грн.</span>
    </div>
    <button class="item__delete js-item__delete" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="12.97" height="13" viewBox="0 0 12.97 13">
            <defs>
                <style>
                    .cls-1 {
                        fill: #8f8f8f;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1" d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z" transform="translate(-1529.03 -230)"/>
        </svg>
    </button>
</div>--}}
