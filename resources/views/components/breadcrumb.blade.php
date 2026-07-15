@if(count($items))
<nav class="flex-shrink-0 my-2 my-sm-0" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        @foreach($items as $item)
            @if(!$loop->last)
                <li class="breadcrumb-item">
                    @isset($item['url'])
                        <a href="{{ $item['url'] }}">
                            {{ $item['label'] }}
                        </a>
                    @else
                        {{ $item['label'] }}
                    @endisset
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $item['label'] }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif