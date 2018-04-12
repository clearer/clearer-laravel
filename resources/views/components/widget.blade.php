<div class="widget">

    @isset($title)
    <div class="widget__header">
            <h2 class="widget__title">{{ $title }}</h2>
        
        @isset($headerActions)
            <div class="widget__header-actions">
                {{ $headerActions }}
            </div>
        @endisset
    </div>
    @endisset

    @isset($nav)
    <div class="widget__nav">
        {{ $nav }}
    </div>
    @endisset

    <div class="widget__content">
        {{ $content }}
    </div>

</div>