<div class="widget">

    <div class="widget__header">
        <h2 class="widget__title">{{ $title }}</h2>
        
        @isset($headerActions)
            {{ $headerActions }}
        @endisset
    </div>

    @isset($nav)
    <div class="widget__nav">
        {{ $nav }}
    </div>
    @endisset

    <div class="widget__content">
        {{ $content }}
    </div>

</div>