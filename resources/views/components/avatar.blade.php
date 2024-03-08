<div @class(['avatar', 'placeholder' => !$src])>
  <div class="{{ $size }} rounded bg-neutral-content ">
    @if ($src)
      <img src="{!! $src !!}" />
    @else
      <span class="font-bold">{{ $alt }}</span>
    @endif
  </div>
</div>
