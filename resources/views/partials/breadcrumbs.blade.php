@if(count($breadcrumbs))
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }} &gt;</a></li>
            @else
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @endif
        @endforeach
    </ul>
@endif
