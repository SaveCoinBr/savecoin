<div class="row">
    <div class="col-12">
        @if(is_string($titulo))
            <h2>{{ $titulo }}</h2>
        @else
            <h2>
                {!! implode('<i style="margin: 0px 5px;" class="fas fa-long-arrow-alt-right"></i>', $titulo) !!}
            </h2>
        @endif
    </div>
</div>
