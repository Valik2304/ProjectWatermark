@foreach($categories as $category)
    <option value="{{ $category->id }}" @if($dataTypeContent->parent_id == $category->id) selected @endif >{!! $space . $category->name !!}</option>
    @if(count($category->children) > 0)
        @php $spaceInclude = $space . '&nbsp;&nbsp;&nbsp;&nbsp;'; @endphp
        @include('vendor.voyager.category.traverse',['categories' => $category->children, 'space' => $spaceInclude ])
    @endif
@endforeach