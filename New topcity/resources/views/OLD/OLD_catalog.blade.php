<div class="catalog">
    <div class="container">
        <h2 class="catalog__title">Каталог</h2>
        <div class="row">
            <div class="catalog__tree-view col-4">

            </div>

{{--            <div class="col-12">--}}
{{--                <div class="bs-example">--}}
{{--                    <div class="accordion" id="accordionExample">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header" id="headingOne">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="far fa-plus-square"></i>Приводная техника</button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="catalog__tree-view"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header" id="headingTwo">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="far fa-plus-square"></i>Техника автоматизации</button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="catalog__tree-view"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header" id="headingThree">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="far fa-plus-square"></i>Energy</button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="catalog__tree-view"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}




            <div class="col-8 catalog__items">
                <div class="row items__btn">
                    <div class="btn__sorting col-lg-6 col-md-12">
                        <span>Сортування:</span>
                        <button type="button" class="button button__sorting">всі</button>
                        <button type="button" class="button button__sorting">в наявності</button>
                    </div>
                    <div class="btn__search col-lg-6 col-md-12">
                        <form action="" method="GET" class="search__form search">
                            <img class="search__icon" src="{{ url('/img/svg/search_icon.svg') }}" alt="">
                                <input type="search" class="search__input" placeholder="Текст" required>
                        </form>
                    </div>
                </div>
                <div class="row items__product">

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, illum.</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые... Lorem ipsum dolor sit amet.</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product__card card">
                            <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">Контакторная сборка Siemens</h5>
                                <h6 class="card-subtitle">
                                    3RA1316-8XB30-1AP0 . . .
                                    <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                </h6>
                                <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                <span class="card-availability">в наявності</span>
                                <span class="card-price">€ 15.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="items__button">
                        <a class="items__button__more more" href="{{ route('news.index') }}">Більше
                            <span class="more__icon">
                                <img src="{{ url('/img/svg/right-arrow.svg') }}" alt="details button">
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="partners">
        <h2 class="partners__title">Партнери</h2>
        <div class="container">
            <div id="carouselExampleIndicators" class="partners__carousel carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                            <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="" aria-hidden="true">
                        <svg class="slider__btn-left" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30"><g><g><path  d="M.278 14.401L14.538.25a.857.857 0 0 1 1.21 0 .842.842 0 0 1 0 1.2L2.096 15l13.652 13.548a.842.842 0 0 1 0 1.201.864.864 0 0 1-.602.252.837.837 0 0 1-.602-.252L.284 15.596a.84.84 0 0 1-.006-1.195z"/></g></g></svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="" aria-hidden="true">
                        <svg class="slider__btn-right" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30"><g><g><path  d="M15.753 14.401L1.493.25a.857.857 0 0 0-1.21 0 .842.842 0 0 0 0 1.2L13.935 15 .283 28.547a.842.842 0 0 0 0 1.201.864.864 0 0 0 .602.252.837.837 0 0 0 .602-.252l14.26-14.152a.84.84 0 0 0 .006-1.195z"/></g></g></svg>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


    </div>
</div>