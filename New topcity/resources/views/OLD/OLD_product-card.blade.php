@extends('layouts.app')
@section('title', 'Головна')
@section('content')
<div class="product-card">
    <div class="container">
        <div class="row card__info">
            <div class="col-12 text-center">
                <h2 class="product-card__title">
                    3RA1316-8XB30 . . .
                    <button type="button" class="modal__button" data-toggle="modal" data-target="#exampleModalCenter">
                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                    </button>

                </h2>

                <!-- Modal -->
                <div class="order-numb__modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Уточните заказной номер</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="modal-content" style="display: inline-block">
                                    <form action="">
                                        <span>1FG1102-</span>

                                        <input type="text" maxlength="1">

                                        <input type="text" maxlength="1">

                                        <span>c23-1</span>

                                        <input type="text" maxlength="1">

                                        <input type="text" maxlength="1">

                                        <input type="text" maxlength="1">
                                    </form>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="button" class="btn btn-primary">В корзину</button>
                            </div>
                        </div>
                    </div>
                </div>







            </div>
            <div class="product-card__img col-lg-4 col-md-6">
                <img class="img-fluid" src="{{ url('/img/product-card.png') }}" alt="product-card">
            </div>
            <div class="product-card__description col-lg-7 col-md-12">
                <p class="description__availability">В наявності</p>
                <div class="description__name row">
                    <p class="name__subject subject col-lg-2 col-md-4">Назва:</p>
                    <p class="name__text text col-lg-10 col-md-8">Реверсивная контакторная сборка Siemens</p>
                </div>
                <div class="description__model-number row">
                    <p class="model-number__subject subject col-lg-2 col-md-4">Артикул:</p>
                    <p class="model-number__text text col-lg-10 col-md-8">3RA1316-8XB30-1AP0 </p>
                </div>
                <div class="description__category row">
                    <p class="category__subject subject col-lg-2 col-md-4">Категорія:</p>
                    <p class="category__text text col-lg-10 col-md-8">Низковольтная комутационная техника</p>
                </div>
                <div class="description__price row">
                    <p class="price__subject subject col-lg-2 col-md-4">Ціна:</p>
                    <p class="price__text text col-lg-10 col-md-8">3400 €</p>
                </div>
                <p class="description__describe col-12">Реверсивная контакторная сборка ac-3 4квт/400v, 3-полюса,
                    типоразмер s00 винтовые клеммы,
                    1нo, ac 230 v, 50 гц, электрическая и механическая блокировка. Реверсивная контакторная
                    сборка ac-3 4квт/400v, 3-полюса, типоразмер s00 винтовые клеммы, 1нo, ac 230 v, 50 гц,
                    электрическая и механическая блокировка. </p>
                <div class="product-card__button">


                    <a class="product-card__more-link" href="#">Додати в ЗІПи</a>

                    <a class="product-card__more-link" href="#">Швидке замовлення</a>

                    <button type="submit" class="product-card__more more">Купити<span
                                class="more__icon"><img
                                    src="{{ url('/img/svg/right-arrow.svg') }}" alt="details button"></span>
                    </button>

                </div>
            </div>
        </div>
        <div class="product-card__tab row">
            <div class="col-12 pl-0 pl-0">
                <ul class="tab__pills nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="pills__item nav-item">
                        <a class="pills__link nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                           role="tab" aria-controls="pills-home" aria-selected="true">Усе про товар</a>
                    </li>
                    <li class="nav-item disable">|</li>
                    <li class="pills__item nav-item">
                        <a class="pills__link nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                           role="tab" aria-controls="pills-profile" aria-selected="false">Характеристика </a>
                    </li>
                    <li class="nav-item disable">|</li>
                    <li class="pills__item nav-item">
                        <a class="pills__link nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                           role="tab" aria-controls="pills-contact" aria-selected="false">Вiдгуки <span
                                    class="badge-blue">(3)</span></a>
                    </li>
                </ul>
                <div class="tab__content tab-content" id="pills-tabContent">
                    <div class="content__about-product tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <h4 class="about-product__title">Опис</h4>
                        <p class="about-product__text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и
                            вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI
                            века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов,
                            используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без
                            заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в
                            новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в
                            более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых
                            используется Lorem Ipsum.</p>
                    </div>
                    <div class="content__characteristic tab-pane fade" id="pills-profile" role="tabpanel"
                         aria-labelledby="pills-profile-tab">
                        <h4 class="characteristic__title">Характеристики</h4>
                        <div class="row characteristic__items">
                            <div class="col-6 items__text">
                                <p class="subject">Корпус</p>
                            </div>
                            <div class="col-6 items__text">
                                <p class="text">ТО-126-3</p>
                            </div>
                        </div>
                        <div class="row characteristic__items">
                            <div class="col-6 items__text">
                                <p class="subject">Корпус</p>
                            </div>
                            <div class="col-6 items__text">
                                <p class="text">ТО-126-3</p>
                            </div>
                        </div>
                        <div class="row characteristic__items">
                            <div class="col-6 items__text">
                                <p class="subject">Корпус</p>
                            </div>
                            <div class="col-6 items__text">
                                <p class="text ">ТО-126-3</p>
                            </div>
                        </div>
                    </div>
                    <div class="content__feedback tab-pane fade" id="pills-contact" role="tabpanel"
                         aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="feedback__title">Відгуки</h4>
                            </div>
                        </div>
                        <form action="">
                            <div class="feedback__form row">
                                <div class="col-6">
                                    <label for="">
                                        <input type="text" placeholder="Ім'я">
                                    </label>
                                    <label for="">
                                        <input type="text" placeholder="E-mail">
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label for="">
                                        <textarea name="" id="" placeholder="Коментар"></textarea>
                                    </label>
                                </div>
                                <div class="feedback__button col-12">
                                    <button class="feedback__more more" href="{{ route('news.index') }}">Надіслати <span
                                                class="more__icon"><img
                                                    src="{{ url('/img/svg/right-arrow.svg') }}"
                                                    alt="details button"></span></button>
                                </div>
                            </div>
                        </form>

                        <div class="feedback__comments row">
                            <div class="comments__items col-12">
                                <p class="comments__text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и
                                    вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с
                                    начала XVI века.</p>
                                <span class="comments__name">Лена</span>
                                <span class="comments__date"> 26.06.2018, 15:35</span>
                            </div>

                            <div class="comments__items col-12">
                                <p class="comments__text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и
                                    вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с
                                    начала XVI века.</p>
                                <span class="comments__name">Лена</span>
                                <span class="comments__date"> 26.06.2018, 15:35</span>
                            </div>

                            <div class="comments__items col-12">
                                <p class="comments__text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и
                                    вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с
                                    начала XVI века.</p>
                                <span class="comments__date"> 26.06.2018, 15:35</span>
                            </div>

                            <div class="comments__items col-12">
                                <p class="comments__text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и
                                    вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с
                                    начала XVI века.</p>
                                <span class="comments__date"> 26.06.2018, 15:35</span>
                            </div>

                        </div>

                        <div class="feedback__button row">
                            <button class="feedback__more more" href="{{ route('news.index') }}">Зберегти <span
                                        class="more__icon"><img
                                            src="{{ url('/img/svg/right-arrow.svg') }}" alt="details button"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection