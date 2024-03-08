<div>
  <input type="file" wire:model="{{ $name }}" class="file-input file-input-ghost w-full max-w-xs hidden"
    accept="image/png, image/jpeg" />
  <button type="button" @click="handleInputClick" class="btn btn-ghost">{{ $slot }}</button>
</div>

<script>
  const handleInputClick = (event) => {
    const btn = event.target;
    const nodes = [...btn.parentElement.childNodes]
    const file = nodes.find(elem => elem.type === 'file')
    if (file) {
      file.click();
    }
  }
</script>
