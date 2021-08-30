<div class="account__navigation nav">
    <ul class="navigation__list list">
        @foreach($items as $menu_item)
            {{--            {{ var_dump(Request::path(),$menu_item->link()) }}--}}
            <li @if('/'.Request::path()==$menu_item->link()) class="navigation__item item--active"
                @else class="navigation__item item" @endif ><a
                        href="{{ $menu_item->link() }}" @if($menu_item->link() == 'shopping-cart') class="js-buy" data-toggle="modal" data-target="#shoplist" @endif>{{ $menu_item->getTranslatedAttribute('title') }}</a></li>
        @endforeach
    </ul>

</div>
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $('.js-buy').click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            console.log('Click');--}}
{{--            VueApp.$refs.cart.showCart();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
