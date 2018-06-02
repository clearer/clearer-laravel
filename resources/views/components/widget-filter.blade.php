@foreach($filters as $filter)
        <a 
            class="{{ $sort == $filter->slug ? 'is-active' : '' }}" 
            href="{{ ( $sort == $filter->slug && !$reverse )  ? '?sort=' . $filter->slug . '&reverse=true' : '?sort=' . $filter->slug }}">
            @if( $sort == $filter->slug )
                <i class="material-icons">
                    {{ ( $sort == $filter->slug && $reverse ) ? 'arrow_drop_down' : 'arrow_drop_up' }}
                </i>
            @endif
            {{ $filter->title }}
        </a>
@endforeach