
<select id="mySelect1" class="js-data-example-ajax" name="state"
        style="width: 300px;" required>
    <option value="" disabled selected hidden>Select your option</option>
</select>
<select id="mySelect2" class=" mt-2 js-data-example-ajax2" style="width: 300px;"
        required>
    <option value="" disabled selected hidden>Select your option</option>
</select>

<div class="order-history">
    <div class="container">
        <h2 class="order-history__title">Історія замовлень</h2>
        <div class="row">
            <div class="col-12">
                <div class="order_accordion accordion" id="order_accordion">

                    <div class="accordion__heading card">
                        <div class="heading__caption card-header">
                            <div class="row">
                                <div class="col-2">
                                    <p class="caption__title title">Дата</p>
                                </div>
                                <div class="col-2">
                                    <p class="caption__title title">номер</p>
                                </div>
                                <div class="col-2">
                                    <p class="caption__title title">сума</p>
                                </div>
                                <div class="col-2">
                                    <p class="caption__title title">статус</p>
                                </div>
                                <div class="col-3">
                                    <p class="caption__title title">Юридична особа</p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion__items card">
                        <div class="items__head card-header" id="headingOne">
                            <div class="row">
                                <div class="col-2">
                                    <p class="head__title title">25.07.2019</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">555</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">25 968 грн</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title accepted__btn">доставлено</p>
                                </div>
                                <div class="col-3">
                                    <p class="head__title title">Попов І.І. “AAA”</p>
                                </div>
                                <div class="col-1">
                                    <button class="head_btn btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <svg class="transform__btn" fill="#8f8f8f" xmlns="http://www.w3.org/2000/svg" width="11"
                                             height="5" viewBox="0 0 11 5">
                                            <path class="cls-1" d="M1534,313l5.5,5,5.5-5h-11Z" transform="translate(-1534 -313)"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="collapseOne" class="accordion__collapse collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="items__body accordion__body card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="total__wrapper">
                                    <div class="row ">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Адреса доставки:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">м. Хмельницький, вул. Подільська 75</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Спосіб оплати:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">Готівка</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__bold">Сума:</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__price">5 000  грн</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion__items card">
                        <div class="items__head card-header" id="headingTwo">
                            <div class="row">
                                <div class="col-2">
                                    <p class="head__title title">25.07.2019</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">555</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">25 968 грн</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title on-the-road__btn">в дорозі</p>
                                </div>
                                <div class="col-3">
                                    <p class="head__title title">Попов І.І. “AAA”</p>
                                </div>
                                <div class="col-1">
                                    <button class="head_btn btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <img src="{{ url('/img/svg/down-arrow.svg') }}" alt="down">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="collapseTwo" class="accordion__collapse collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="items__body accordion__body card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="total__wrapper">
                                    <div class="row ">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Адреса доставки:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">м. Хмельницький, вул. Подільська 75</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Спосіб оплати:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">Готівка</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__bold">Сума:</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__price">5 000  грн</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion__items card">
                        <div class="items__head card-header" id="headingThree">
                            <div class="row">
                                <div class="col-2">
                                    <p class="head__title title">25.07.2019</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">555</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title">25 968 грн</p>
                                </div>
                                <div class="col-2">
                                    <p class="head__title title canceled__btn">відмінено</p>
                                </div>
                                <div class="col-3">
                                    <p class="head__title title">Попов І.І. “AAA”</p>
                                </div>
                                <div class="col-1">
                                    <button class="head_btn btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        <img src="{{ url('/img/svg/down-arrow.svg') }}" alt="down">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseThree" class="accordion__collapse collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="items__body accordion__body card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ url('/img/order_history.png') }}" alt="product">
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title title__bold">Реверсивная контакторная сборка Siemens</p>
                                        <p class="title__light">Низковольтная комутационная техника</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="body__title">3RA1316-8XB30-1AP0</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title">220 шт.</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="body__title title__bold">270 грн.</p>
                                    </div>
                                </div>
                                <div class="total__wrapper">
                                    <div class="row ">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Адреса доставки:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">м. Хмельницький, вул. Подільська 75</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="body__title title__bold">Спосіб оплати:</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="body__title">Готівка</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__bold">Сума:</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="body__title title__price">5 000  грн</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
</div>

<script>
    $('.head_btn').click(function (e) {
       console.log (e.target);
    $('.items__head').style.cssText = 'border-bottom: 1px solid #00a3d4;';
    })
</script>