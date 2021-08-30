@if (count($breadcrumbs))

    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}
                        <span style="display: none" itemprop="name">{{ $breadcrumb->title }}</span>
                        <meta itemprop="position" content="{{ $loop->index+1 }}" />
                    </a>

                </li>
            @else
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" class="breadcrums--active" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}
                        <span style="display: none" itemprop="name">{{ $breadcrumb->title }}</span>
                        <meta itemprop="position" content="{{ $loop->index+1 }}" />
                    </a>

                </li>

            @endif

        @endforeach
    </ul>

@endif

