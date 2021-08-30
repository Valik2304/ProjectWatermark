<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="checkout">
                <h2 class="checkout__title">Оформлення замовлення</h2>
                <div class="checkout__step">
                    <div class="step__block">
                        <span>1</span>
                    </div>
                    <div class="step__title">
                        <span>Lorem ipsum.</span>
                    </div>
                </div>
                <div class="checkout__clients-filter">
                    <button type="button" class="button filter__button">Я зареєстрований</button>
                </div>
                <form class="checkout-conteiner" action="">

                    <div class="form-group">
                        <label for="name" class="">Ім’я та прізвище</label>
                        <input class="form-control" id="name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="city">Юридична особа</label>
                        <select class="form-control" id="city" required>
                            <option>Lorem ipsum dolor.</option>
                            <option>Lorem ipsum dolor sit.</option>
                            <option>Lorem ipsum.</option>
                            <option>Lorem ipsum dolor.</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="">Телефон</label>
                        <input class="form-control" id="phone" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="">Эл. почта</label>
                        <input class="form-control" id="email" type="text" required>
                    </div>

                </form>
            </div>

            <div class="delivery-payment">
                <div class="checkout__step">
                    <div class="step__block">
                        <span>2</span>
                    </div>
                    <div class="step__title">
                        <span>Вибір способів доставки і оплати</span>
                    </div>
                </div>

                <div class="basket__item item row">
                    <div class="col-2">
                        <img class="item__image" src="{{ url('/img/product-card.png') }}" alt="">
                    </div>
                    <div class="col-5">
                        <p class="item__dis bold">Реверсная контакторная сборка Siemens</p>
                        <p class="item__dis">изковльтная комутационная техника</p>
                    </div>

                    <div class="item__summ col-1">
                        <p>2шт</p>
                    </div>
                    <div class="item__base-price offset-1 col-2">
                        <span class="bold">270</span> <span class="bold">грн.</span>
                    </div>
                </div>


                <div class="delivery">
                    <h2 class="delivery__title">Доставка Нова Пошта</h2>
                    <form action="">
                        <div class="row">
                            <div class="col-1 mt-2">
                                <input id="delivery__radiobutton1" name="radiobutton" type="radio" value="radiobutton" data-id="first">
                            </div>
                            <div class="col-4">
                                <div class="delivery__form1" id="first">
                                        <select class="form-control" required>
                                            <option>Lorem ipsum dolor.</option>
                                            <option>Lorem ipsum dolor sit.</option>
                                            <option>Lorem ipsum.</option>
                                            <option>Lorem ipsum dolor.</option>
                                        </select>
                                        <select class="form-control mt-2" required>
                                            <option>Lorem ipsum dolor.</option>
                                            <option>Lorem ipsum dolor sit.</option>
                                            <option>Lorem ipsum.</option>
                                            <option>Lorem ipsum dolor.</option>
                                        </select>
                                    <div class="col-4">
                                        <select id="mySelect1" class="js-data-example-ajax"  name="state"style="width: 300px;" required>
                                            <option value="" disabled selected hidden>Select your option</option>
                                        </select>
                                        <select id="mySelect2" class=" mt-2 js-data-example-ajax2" style="width: 300px;" required>
                                            <option value="" disabled selected hidden>Select your option</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    </form>--}}
{{--                    <form action="" class="mt-4">--}}
                        <div class="row">
                            <div class="col-1">
                                <input id="delivery__radiobutton2" name="radiobutton" type="radio" value="radiobutton" data-id="second">

                            </div>
                            <div class="col-4">
                                <div class="delivery__form2" id="second">
                                                <select class="form-control" required>
                                                    <option>Lorem ipsum dolor.</option>
                                                    <option>Lorem ipsum dolor sit.</option>
                                                    <option>Lorem ipsum.</option>
                                                    <option>Lorem ipsum dolor.</option>
                                                </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="payment">
                    <h2 class="payment__title">Оплата</h2>
                    <form action="">
                        <p><input name="radiobutton" type="radio" value="radiobutton"> Готівка</p>
                        <p><input name="radiobutton" type="radio" value="radiobutton checked"> Онлайн карта VISA/Master Card/Приват24</p>
                        <p><input name="radiobutton" type="radio" value="radiobutton"> Безготівковий</p>
                    </form>
                </div>
            </div>

            <div class="enter__button">
                <button class="learn-more">
                    <div class="circle">
                        <span class="icon arrow"></span>
                    </div>
                    <p class="button-text">Купити</p>
                </button>
            </div>
        </div>
        <div class="col-4">
            заглушка
        </div>
    </div>
</div>