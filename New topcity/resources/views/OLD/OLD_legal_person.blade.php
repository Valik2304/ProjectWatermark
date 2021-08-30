
        <div class="legal-person__info info row">
            <div class="info__company-name col-4">
                <p class="company-name__text">Організація "ААА"</p>
            </div>
            <div class="info__contact-person col-7">
                <p class="contact-person__text">55555555555</p>
                <p class="contact-person__text">г.Хуст, Закарпатская область, Хустсткий р-н, ул. Ивана-Франка д.185а</p>
                <p class="contact-person__text">Іванов Іван Іванович</p>
                <p class="contact-person__text">+38 067 777 7777</p>
                <p class="contact-person__text">mail@gmail.com</p>
            </div>
            <div class="info__times-circle col-1">
                <a class="times-circle__btn" href="#">
                    <svg fill=" #e2e5e9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 18 18">
                        <path id="error_copy_2_копия" data-name="error  copy 2 копия" class="cls-1" d="M1336.01,282a9,9,0,1,1,9-9A9,9,0,0,1,1336.01,282Zm4.13-11.625a0.45,0.45,0,0,0,0-.612l-0.92-.919a0.441,0.441,0,0,0-.62,0l-2.6,2.6-2.6-2.6a0.441,0.441,0,0,0-.62,0l-0.91.919a0.431,0.431,0,0,0,0,.612l2.6,2.6-2.6,2.6a0.432,0.432,0,0,0,0,.613l0.91,0.919a0.442,0.442,0,0,0,.62,0l2.6-2.6,2.6,2.6a0.442,0.442,0,0,0,.62,0l0.92-.919a0.451,0.451,0,0,0,0-.613l-2.61-2.6Z" transform="translate(-1327 -264)"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="legal-person__form row">
            <div class="form__company-name col-4">
                <p class="company-name__title">Організація:</p>
            </div>
            <div class="form__input-info col-8">
                <form action="">
                    <label for="">
                        <img class="lock__icon" src="{{ url('/img/svg/lock.svg') }}" alt="">
                        <input type="text" name="name" placeholder="Назва*">
                    </label>
                    <label for="">
                        <input type="text" name="inn" placeholder="ІНН*">
                    </label>
                    <label for="">
                        <input type="text" name="address" placeholder="Юридична адреса*">
                    </label>
                </form>
            </div>
        </div>

        <div class="legal-person__form row">
            <div class="form__contact-person col-4">
                <p class="contact-person__title">Контактна особа:</p>
            </div>
            <div class="form__input-info col-8">
                <form action="">
                    <label for="">
                        <img class="lock__icon" src="{{ url('/img/svg/lock.svg') }}" alt="">
                        <input type="text" name="mail" placeholder="E-mail*">
                    </label>
                    <label for="">
                        <input type="text" name="name" placeholder="Прізвище*">
                    </label>
                    <label for="">
                        <input type="text" name="name" placeholder="Ім’я*">
                    </label>
                    <label for="">
                        <input type="text" name="name" placeholder="По батькові">
                    </label>
                    <label for="">
                        <input type="text" name="phone" placeholder="Телефон*">
                    </label>
                </form>
            </div>
        </div>

        <div class="legal-person__description row">
            <div class="description__icon col-1">
                <img class="icon__info" src="{{ url('/img/svg/info_icon.svg') }}" alt="info">
            </div>
            <div class="description__text col-11">
                <p class="text__text">Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків </p>
            </div>
        </div>

        <div class="legal-person__button">
            <button class="legal-person__more more" href="{{ route('news.index') }}">Зберегти
                <span class="more__icon"><img src="{{ url('/img/svg/right-arrow.svg') }}" alt="details button"></span>
            </button>
        </div>
    </div>
</div>