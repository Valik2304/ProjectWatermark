<ul style="list-style-type: none;">
    @foreach ($categories as $category)
        <li><label><input value="{{ $category->id }}" type="checkbox" name="category[]" style="margin-right: 5px;" {{ $categoriesForProduct->contains($category) ? 'checked' : '' }}>{{ $category->name }}</label></li>
        @if(count($category->children) > 0)
            @include('vendor.voyager.products.traverse',['categories'=>$category->children])
        @endif
    @endforeach
</ul>
