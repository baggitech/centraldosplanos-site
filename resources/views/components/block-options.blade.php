<div {{ $attributes->merge(['class' => 'block-options']) }}>

    @if($fullscreen)
        <button
            type="button"
            class="btn-block-option"
            data-toggle="block-option"
            data-action="fullscreen_toggle">
        </button>
    @endif

    @if($pin)
        <button
            type="button"
            class="btn-block-option"
            data-toggle="block-option"
            data-action="pinned_toggle">
            <i class="si si-pin"></i>
        </button>
    @endif

    @if($refresh)
        <button
            type="button"
            class="btn-block-option"
            data-toggle="block-option"
            data-action="state_toggle"
            data-action-mode="{{ $refreshMode }}">
            <i class="si si-refresh"></i>
        </button>
    @endif

    @if($collapse)
        <button
            type="button"
            class="btn-block-option"
            data-toggle="block-option"
            data-action="content_toggle">
        </button>
    @endif

    @if($close)
        <button
            type="button"
            class="btn-block-option"
            data-toggle="block-option"
            data-action="close">
            <i class="si si-close"></i>
        </button>
    @endif

</div>