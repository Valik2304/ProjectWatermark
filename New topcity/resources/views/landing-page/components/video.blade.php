
<section class="video">
{{--    coment error video--}}
{{--    @if($video_exists)--}}

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-1"></div>--}}
{{--            <div class="col-xl-10 video___block">--}}
{{--                <video id="video__player" controls>--}}
{{--                    <source src="{{ asset($video) }}" type="video/mp4">--}}
{{--                    <source src="{{ url('/video/trailer.mp4' ) }}" type="video/mp4">--}}
{{--                    Your browser does not support HTML5 video.--}}
{{--                </video>--}}
{{--                <button class="play__button">--}}
{{--                    <img class="lazyImage button__image base" data-src="{{ url('/img/video/Ellipse1.png') }}" alt="">--}}
{{--                    <img class="lazyImage button__image arrow" data-src="{{ url('/img/video/Forma1.png') }}" alt="">--}}
{{--                    <img class="lazyImage button__image border__small" data-src="{{ url('/img/video/Ellipse2.png') }}" alt="">--}}
{{--                    <img class="lazyImage button__image border__big" data-src="{{ url('/img/video/Ellipse3.png') }}" alt="">--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="col-xl-1"></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @endif--}}
    @include('catalog.partners')

</section>

