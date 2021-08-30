@inject('partners','App\Services\PartnerService')
@inject('imageService','App\Services\ImageService')
@php $partners = $partners->getAll() @endphp
@if($partners->count() > 0)
    <div class="partners">
        <h2 class="partners__title">{{ __('main_page.partners') }}</h2>
        <div id="carouselExampleIndicators" class="partners__carousel carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="" aria-hidden="true">
                    <svg class="slider__btn-left" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                         height="30" viewBox="0 0 16 30"><g><g><path
                                        d="M.278 14.401L14.538.25a.857.857 0 0 1 1.21 0 .842.842 0 0 1 0 1.2L2.096 15l13.652 13.548a.842.842 0 0 1 0 1.201.864.864 0 0 1-.602.252.837.837 0 0 1-.602-.252L.284 15.596a.84.84 0 0 1-.006-1.195z"/></g></g></svg>
                </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="" aria-hidden="true">
                    <svg class="slider__btn-right" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                         height="30" viewBox="0 0 16 30"><g><g><path
                                        d="M15.753 14.401L1.493.25a.857.857 0 0 0-1.21 0 .842.842 0 0 0 0 1.2L13.935 15 .283 28.547a.842.842 0 0 0 0 1.201.864.864 0 0 0 .602.252.837.837 0 0 0 .602-.252l14.26-14.152a.84.84 0 0 0 .006-1.195z"/></g></g></svg>
                </span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
            <div class="container">
                <div class="responsive partners__carousel3">
                    @foreach($partners as $partner)
                        <div>
                            <a href="{{ $partner->link }}">
                                <img data-src="{{ url($imageService->resizeImage('storage/'. $partner->image,283,158)) }}"
                                     alt="partners" class="img-fluid contrast lazyImage">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
