@props(['trigger'])

<div x-data="{ open: false }" @click.outside="open = false">

    {{-- trigger --}}
    <div x-on:click="open = ! open">
        {{ $trigger }}
    </div>

    {{-- links --}}
    <div x-show="open" class="py-2 absolute" style="display: none">
        {{ $slot }}
    </div>
</div>
